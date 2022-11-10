<?php

namespace App\Http\Controllers\Api\Signature\Dtos;

class SignatureDto
{
    public $id;
    public $name;

    public function __construct(Object $object)
    {
        $this->id = $object->id;
        $this->name = $object->name;
        $this->email = $object->email;
    }
}
