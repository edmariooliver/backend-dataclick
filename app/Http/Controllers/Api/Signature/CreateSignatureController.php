<?php

namespace App\Http\Controllers\Api\Signature;

use App\Http\Controllers\Api\Signature\Dtos\SignatureDto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Signature\CreateSignatureService;

class CreateSignatureController extends Controller
{
    protected CreateSignatureService $service;

    public function __construct(CreateSignatureService $createSignatureService)
    {
        $this->service = $createSignatureService;
    }

    public function create(Request $request)
    {
        $dto = new SignatureDto($request);
        $this->service->execute($dto);
        return Response()->json("ok", 201);
    }
}
