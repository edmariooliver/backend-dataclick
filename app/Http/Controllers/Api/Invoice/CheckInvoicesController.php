<?php

namespace App\Http\Controllers\Api\Invoice;

use App\Http\Controllers\Controller;
use App\Services\Invoice\CheckInvoicesService;

class CheckInvoicesController extends Controller
{
    protected CheckInvoicesService $service;

    public function __construct(CheckInvoicesService $checkInvoicesService)
    {
        $this->service = $checkInvoicesService;
    }
    
    /**
     * This controller is responsible for fetching all invoices 
     * and updating their status ex: if today's date is greater 
     * than the due date, its status will be "PENDENTE"
     */
    public function index() 
    {
        $this->service->execute();
    }
}
