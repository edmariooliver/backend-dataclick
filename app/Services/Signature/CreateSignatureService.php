<?php

namespace App\Services\Signature;

use App\Exceptions\InvalidSignatureDataException;
use App\Repositories\SignatureRepository;
use App\Http\Controllers\Api\Signature\Dtos\SignatureDto;
use App\Validators\SignatureValidator;
use Illuminate\Support\Facades\Hash;

class CreateSignatureService
{
    protected SignatureRepository $repository;

    /**
     * 
     */
    public function __construct(SignatureRepository $SignatureRepository)
    {
        $this->repository = $SignatureRepository;
    }

    /**
     * Create new task
     */
    public function execute(SignatureDto $SignatureDto)
    {
        $validator = SignatureValidator::run($SignatureDto, "CREATE");

        $Signature = [
            "name"  => $SignatureDto->name,
            "email" => $SignatureDto->email,
            "password"  => Hash::make($SignatureDto->password),
        ];
        
        /**
         * @var Illuminate\Validation\Validator $validator
         */
        return $validator->fails() ? throw new InvalidSignatureDataException($validator->messages()) : $this->repository->create($Signature); 
    }
}
