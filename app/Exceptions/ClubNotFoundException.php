<?php

namespace App\Exceptions;

use Exception;

class ClubNotFoundException extends Exception
{
    public function render() {
        return response()->json([
            'message' => 'Club not found'
        ], 404);
    }
}
