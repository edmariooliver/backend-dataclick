<?php

namespace App\Http\Controllers\Api\Invoice;

use App\Http\Controllers\Controller;
use App\Services\Invoice\PayInvoiceService;
use Illuminate\Http\Request;

class PayInvoiceController extends Controller
{
    protected PayInvoiceService $service;

    public function __construct(PayInvoiceService $payInvoiceService)
    {
        $this->service = $payInvoiceService;
    }


    public function pay(Request $request)
    {
        return Response()->json([$this->service->execute($request->id)], 200);
    }
}
