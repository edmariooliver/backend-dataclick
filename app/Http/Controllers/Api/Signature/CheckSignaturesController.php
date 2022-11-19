<?php

namespace App\Http\Controllers\Api\Signature;

use Illuminate\Http\Request;
use App\Services\Signature\CheckSignaturesService;
use App\Http\Controllers\Controller;

class CheckSignaturesController extends Controller
{
    //
    protected CheckSignaturesService $service;

    public function __construct(CheckSignaturesService $checkSignatureService)
    {
        $this->service = $checkSignatureService;
    }

    public function index(Request $request)
    {
        $this->service->execute();
        return Response()->json("ok", 200);
    }
    
}
