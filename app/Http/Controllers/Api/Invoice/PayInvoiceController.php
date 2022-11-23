<?php

namespace App\Http\Controllers\Api\Invoice;

use App\Http\Controllers\Controller;
use App\Services\Invoice\PayInvoiceService;
use Illuminate\Http\Request;

class PayInvoiceController extends Controller
{
    protected PayInvoiceService $payInvoiceService;

    public function __construct(PayInvoiceService $payInvoiceService)
    {
        $this->payInvoiceService = $payInvoiceService;
    }

    public function pay(Request $request)
    {
        
        $this->payInvoiceService->execute($request->id);
        return Response()->json(["Fatura paga com sucesso!"], 200);
        
    }
}
