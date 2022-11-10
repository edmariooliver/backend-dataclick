<?php

namespace App\Http\Controllers\Api\Signature;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Signature\DestroySignatureService;

class DestroySignatureController extends Controller
{
    protected DestroySignatureService $service;

    public function __construct(DestroySignatureService $destroySignatureService)
    {
        $this->service = $destroySignatureService;
    }

    public function destroy(Request $request)
    {
        $this->service->execute($request->id);
        return response()->json(["ok"], 200);
    }
}
