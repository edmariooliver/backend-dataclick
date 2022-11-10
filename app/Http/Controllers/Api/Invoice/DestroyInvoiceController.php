<?php

namespace App\Http\Controllers\Api\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Invoice\DestroyInvoiceService;

class DestroyInvoiceController extends Controller
{
    protected DestroyInvoiceService $service;

    public function __construct(DestroyInvoiceService $destroyInvoiceService)
    {
        $this->service = $destroyInvoiceService;
    }

    public function destroy(Request $request)
    {
        $this->service->execute($request->id);
        return response()->json(["ok"], 200);
    }
}
