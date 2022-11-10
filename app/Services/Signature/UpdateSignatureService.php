<?php

namespace App\Services\Signature;

use App\Http\Controllers\Api\Signature\Dtos\SignatureDto;
use App\Repositories\SignatureRepository;
use App\Exceptions\InvalidSignatureDataException;
use App\Exceptions\SignatureNotFoundException;
use App\Http\Controllers\Api\Signature\Dtos\ResponseSignatureDto;
use App\Validators\SignatureValidator;
use Illuminate\Support\Facades\Hash;

class UpdateSignatureService
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
    public function execute($id = null, SignatureDto $signatureDto)
    {
        $validator = SignatureValidator::run($signatureDto, "UPDATE");
        
        $signatureArray  = [];

        if(!is_null($signatureDto->name)) {
            $signatureArray["name"] = $signatureDto->name;
        }
        
        if(!is_null($signatureDto->email)) {
            $signatureArray["email"] = $signatureDto->email;
        }

        if(!is_null($signatureDto->password)) {
            $signatureArray["password"] = Hash::make($signatureDto->password);
        }

        /**
         * @var Illuminate\Validation\Validator $validator
         */
        if($validator->fails()) {
            throw new InvalidSignatureDataException($validator->messages());
        }
        
        if ($this->repository->update($id, $signatureArray)) {
            return new ResponseSignatureDto($this->repository->findById($id));
        }else{
            throw new SignatureNotFoundException();
        }
    }
}