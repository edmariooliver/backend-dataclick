<?php

namespace App\Services\Invoice;

use App\Models\Invoice;
use App\Repositories\InvoiceRepository;

class CheckInvoicesService
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
    public function execute()
    {
        $this->repository->updateInvoicesStatusDue(date("Y-m-d"));
    }
}
