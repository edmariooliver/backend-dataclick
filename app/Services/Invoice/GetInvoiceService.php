<?php

namespace App\Services\Invoice;

use App\Exceptions\InvoiceNotFoundException;
use App\Repositories\InvoiceRepository;
use App\Models\Invoice;

class GetInvoiceService
{
    protected InvoiceRepository $repository;

    /**
     * @param InvoiceRepository $InvoiceRepository
     */
    public function __construct(InvoiceRepository $clubRepository)
    {
        $this->repository = $clubRepository;
    }

    /**
     * 
     */
    public function execute(int $id = null)
    {
        $club = ($id == null) ? $this->findAll() : $this->findById(($id)); 

        if($club == null) {
            throw new InvoiceNotFoundException();
        }
        return $club;
    }
    
    /**
     * get all Invoices
     * @return 
     */
    public function findAll()
    {
        $clubs = $this->repository->findAll();
        return $clubs;
    }
    
    /**
     * get Invoice by id 
     * @return Invoice
     */
    public function findById(int $id)
    {
        return $this->repository->findById($id);
    }
}
