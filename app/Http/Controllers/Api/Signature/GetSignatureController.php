<?php

namespace App\Http\Controllers\Api\Signature;

use App\Http\Controllers\Controller;
use App\Services\Signature\GetSignatureService;
use Illuminate\Http\Request;

class GetSignatureController extends Controller
{
    protected GetSignatureService $service;

    public function __construct(GetSignatureService $getSignatureService)
    {
        $this->service = $getSignatureService;
    }

    public function findAll()
    {
        return response()->json($this->service->execute(), 200);
    }

    public function findById(Request $request)
    {
        return response()->json($this->service->execute($request->id), 200);
    }
}
