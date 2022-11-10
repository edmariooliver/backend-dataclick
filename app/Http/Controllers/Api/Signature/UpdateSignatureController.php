<?php

namespace App\Http\Controllers\Api\Signature;

use App\Http\Controllers\Api\Signature\Dtos\SignatureDto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Signature\UpdateSignatureService;

class UpdateSignatureController extends Controller
{
    protected UpdateSignatureService $service;

    public function __construct(UpdateSignatureService $updateSignatureService)
    {
        $this->service = $updateSignatureService;
    }

    /**
     * 
     */
    public function update(Request $request)
    {
        $dto = new SignatureDto($request);
        return Response()->json(
            $this->service->execute($request->id, $dto),
            200
        );
    }
}
