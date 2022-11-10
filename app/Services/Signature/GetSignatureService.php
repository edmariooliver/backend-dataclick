<?php

namespace App\Services\Signature;

use App\Exceptions\SignatureNotFoundException;
use App\Repositories\SignatureRepository;
use App\Repositories\InvoiceRepository;

class GetSignatureService
{
    protected $signatureRepository;
    protected $invoiceRepository;

    /**
     * 
     */
    public function __construct(SignatureRepository $signatureRepository, InvoiceRepository $invoiceRepository)
    {
        $this->signatureRepository = $signatureRepository;
        $this->invoiceRepository   = $invoiceRepository;
    }

    /**
     * 
     */
    public function execute(int $id = null)
    {
        $signature = ($id == null) ? $this->findAll() : $this->findById(($id)); 

        if($signature == null) {
            throw new SignatureNotFoundException();
        }
        return $signature;
    }
    
    /**
     * get all Signatures
     * @return 
     */
    public function findAll()
    {
        $signatures = $this->signatureRepository->findAll();
        return $signatures;
    }
    
    /**
     * get Signature by id 
     * @return Array
     */
    public function findById(int $id)
    {
        $invoices = $this->invoiceRepository->findByIdSignature($id);
        $siganture = $this->signatureRepository->findById($id);

        if($siganture == NULL) {
            throw new SignatureNotFoundException();
        }
        return [$siganture, ["invoices" => $invoices]];
    }
}
