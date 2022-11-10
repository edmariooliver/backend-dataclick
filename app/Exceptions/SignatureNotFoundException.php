<?php

namespace App\Exceptions;

use Exception;

class SignatureNotFoundException extends Exception
{
    public function render() {
        return response()->json([
            'message' => 'Signature not found'
        ], 404);
    }
}
