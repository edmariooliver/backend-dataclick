<?php

namespace App\Http\Controllers\Api\Club\Dtos;

class ResponseClubDto
{
    public $id;
    public $name;
    public function __construct(Object $object)
    {
        $this->id = $object->id;
        $this->name = $object->name;
    }
}
