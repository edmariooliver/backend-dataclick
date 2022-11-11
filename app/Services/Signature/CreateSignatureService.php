<?php

namespace App\Services\Signature;

use App\Exceptions\InvalidSignatureDataException;
use App\Repositories\SignatureRepository;
use App\Http\Controllers\Api\Signature\Dtos\SignatureDto;
use App\Repositories\InvoiceRepository;
use App\Validators\SignatureValidator;
use App\Utils\InvoicesUtils;

class CreateSignatureService
{
    protected $signatureRepository;
    protected $invoiceRepository;

    /**
     * 
     */
    public function __construct(SignatureRepository $signatureRepository, InvoiceRepository $invoiceRepository)
    {
        $this->signatureRepository = $signatureRepository;
        $this->invoiceRepository  = $invoiceRepository;
    }

    /**
     * 
     */
    public function execute(SignatureDto $signatureDto)
    {
        $validator = SignatureValidator::run($signatureDto, "CREATE");

        $signature = [
            "id_user"  => $signatureDto->idUser,
            "id_club" => $signatureDto->idClub,
            "status_signature" => 1
        ];
        
        if ($this->signatureRepository->findByUserAndClub($signatureDto->idUser, $signatureDto->idClub))
        {
            throw new InvalidSignatureDataException("Este usuário já possui uma assinatura com o clube!");
        }

        if($validator->fails()) {
            throw new InvalidSignatureDataException($validator->messages());
        }

        $signatureResponse = $this->signatureRepository->create($signature);

        if($signatureResponse) {
            $invoices = InvoicesUtils::generateInvoices($signatureResponse->id);
            foreach($invoices as $invoice) {
                $this->invoiceRepository->create($invoice);
            }
        }
    }
}
