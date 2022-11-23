<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use App\Models\Invoice;

class InvoiceRepository implements RepositoryInterface
{
    
    /**
     * @var \App\Models\Invoice $entity
     */
    protected $entity;

    /**
     * 
     */
    public function __construct(Invoice $invoice)
    {
        $this->entity = $invoice;
    }

    /**
     * 
     */
    public function findById($id)
    {
        return $this->entity->where("id", $id)->first();
    }

    /**
     * 
     */
    public function findAll()
    {
        return $this->entity->select("*")->get();
    }

    /**
     * 
     */
    public function destroy(int $id)
    {
        return $this->entity->destroy($id);
    }

    /**
     * 
     */
    public function update(int $id, Array $invoice)
    {
        if($this->entity->find($id) == NULL) {
            return false;
        }
        return $this->entity->where("id", $id)->update($invoice);
    }

    /**
     * 
     */
    public function create(Array $invoice)    
    {
        return $this->entity->create($invoice);
    }

    /**
     * 
     */
    public function findByIdSignature(Int $id)
    {
        return $this->entity
            ->select("invoices.*", "status_invoices.description as status")
            ->join("status_invoices", "status_invoices.id", "invoices.status")
            ->where("id_signature", $id)
            ->orderBy("invoices.id", "ASC")
            ->get();
}

    public function findPendingInvoices(String $date, Int $idSignature) 
    {
        return $this->entity
            ->select("invoices.*", "status_invoices.description as status")
            ->join("status_invoices", "status_invoices.id", "invoices.status")
            ->where("id_signature", $idSignature)
            ->where("due_date", "<", $date)
            ->where("status", Invoice::STATUS_INVOICE_PENDING)
            ->get();
    }
    public function findDueInvoices(String $date, Int $idSignature) 
    {
        return $this->entity
            ->select("invoices.*", "status_invoices.description as status")
            ->join("status_invoices", "status_invoices.id", "invoices.status")
            ->where("id_signature", $idSignature)
            ->where("due_date", "<", $date)
            ->where("status", Invoice::STATUS_INVOICE_DUE)
            ->get();
    }

    /**
     * 
     */
    public function updateInvoicesStatusDue(String $date)
    {
        if($date == NULL) {
            return false;
        }
        return $this->entity
            ->where("due_date", '<', $date)
            ->where("status", "=", Invoice::STATUS_INVOICE_PENDING)
            ->update(['status' => Invoice::STATUS_INVOICE_DUE]);
    }
}