<?php

namespace App\Http\Controllers\Api\Signature\Dtos;

class SignatureDto
{
    public $name;
    public $email;
    public $password;

    public function __construct(Object $object)
    {
        $this->name = $object->name;
        $this->email = $object->email;
        $this->password = $object->password;
    }
}