<?php

namespace App\Http\Controllers\Api\Invoice;

use App\Http\Controllers\Controller;
use App\Services\Invoice\GetInvoiceService;
use Illuminate\Http\Request;

class GetInvoiceController extends Controller
{
    protected GetInvoiceService $service;

    public function __construct(GetInvoiceService $getInvoiceService)
    {
        $this->service = $getInvoiceService;
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
