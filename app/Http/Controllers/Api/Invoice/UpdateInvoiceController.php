<?php

namespace App\Http\Controllers\Api\Invoice;

use App\Http\Controllers\Api\Invoice\Dtos\InvoiceDto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Invoice\UpdateInvoiceService;

class UpdateInvoiceController extends Controller
{
    protected UpdateInvoiceService $service;

    public function __construct(UpdateInvoiceService $updateInvoiceService)
    {
        $this->service = $updateInvoiceService;
    }

    /**
     * 
     */
    public function update(Request $request)
    {
        $dto = new InvoiceDto($request);
        return Response()->json(
            $this->service->execute($request->id, $dto),
            200
        );
    }
}
