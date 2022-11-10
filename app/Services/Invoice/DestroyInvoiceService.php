<?php

namespace App\Services\Invoice;

use App\Exceptions\InvoiceNotFoundException;
use App\Repositories\InvoiceRepository;

class DestroyInvoiceService
{
    protected InvoiceRepository $repository;

    public function __construct(InvoiceRepository $InvoiceRepository)
    {
        $this->repository = $InvoiceRepository;
    }

    public function execute($id)
    {
        $Invoices = $this->repository->findByid($id);
        if($Invoices == NULL) {
            throw new InvoiceNotFoundException();
        }
        $this->repository->destroy($Invoices->id);
    }
}
