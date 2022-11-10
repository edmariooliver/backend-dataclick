<?php

namespace App\Services\Signature;

use App\Exceptions\SignatureNotFoundException;
use App\Repositories\SignatureRepository;
use App\Models\Signature;

class GetSignatureService
{
    /**
     * 
     */
    protected SignatureRepository $repository;

    /**
     * @param SignatureRepository $signatureRepository
     */
    public function __construct(SignatureRepository $signatureRepository)
    {
        $this->repository = $signatureRepository;
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
        $signatures = $this->repository->findAll();
        return $signatures;
    }
    
    /**
     * get Signature by id 
     * @return Signature
     */
    public function findById(int $id)
    {
        return $this->repository->findById($id);
    }
}
