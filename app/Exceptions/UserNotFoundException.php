<?php

namespace App\Exceptions;

use Exception;

class UserNotFoundException extends Exception
{
    public function render() {
        return response()->json([
            'message' => 'Usuário não encontrado!'
        ], 404);
    }
}
