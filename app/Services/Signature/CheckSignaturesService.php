<?php

namespace App\Services\Signature;

use App\Models\Signature;
use App\Repositories\SignatureRepository;

class CheckSignaturesService
{
    
    protected SignatureRepository $repository;

    /**
     * 
     */
    public function __construct(SignatureRepository $signatureRepository)
    {
        $this->repository = $signatureRepository;
    }

    /**
     * 
     */
    public function execute()
    {
        $this->repository->checkStatusSignatureActive();
        $this->repository->checkStatusSignatureDefaulter();
    }
}
