<?php

namespace App\Exceptions;

use Exception;

class InvoiceNotFoundException extends Exception
{
    public function render() {
        return response()->json([
            'message' => 'Invoice not found'
        ], 404);
    }
}
