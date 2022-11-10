<?php

namespace App\Services\Signature;

use App\Exceptions\SignatureNotFoundException;
use App\Repositories\SignatureRepository;

class DestroySignatureService
{
    protected SignatureRepository $repository;

    public function __construct(SignatureRepository $signatureRepository)
    {
        $this->repository = $signatureRepository;
    }

    public function execute($id)
    {
        $signatures = $this->repository->findByid($id);
        if($signatures == NULL) {
            throw new SignatureNotFoundException();
        }
        $this->repository->destroy($signatures->id);
    }
}
