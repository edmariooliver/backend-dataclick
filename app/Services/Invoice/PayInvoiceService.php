<?php

namespace App\Services\Invoice;

use App\Exceptions\InvoiceNotFoundException;
use App\Models\Invoice;
use App\Repositories\InvoiceRepository;
use App\Exceptions\InvoicePaidException;

class PayInvoiceService
{
    
    protected InvoiceRepository $repository;

    /**
     * 
     */
    public function __construct(InvoiceRepository $invoiceRepository)
    {
        $this->repository = $invoiceRepository;
    }

    /**
     * 
     */
    public function execute(int $id)
    {

        $invoice = $this->repository->findById($id);

        if($invoice == NULL) {
            throw new InvoiceNotFoundException();
        }

        if($invoice->status == Invoice::STATUS_INVOICE_PAID) {
            throw new InvoicePaidException(["errors"=>"A fatura já esta paga!"]);
        }

        if(count($this->repository->findPendingInvoices($invoice->due_date, $invoice->id_signature)) > 0) {
            throw new InvoicePaidException(["errors"=>"Você possui faturas antigas pendentes!"]);
        }

        if(count($this->repository->findDueInvoices($invoice->due_date, $invoice->id_signature)) > 0) {
            throw new InvoicePaidException(["errors"=>"Você possui faturas antigas vencidas!"]);
        }

        if ($this->repository->update($id, ["status" => 2])) {
            return "Fatura paga com sucesso!";
        }
    }
}
