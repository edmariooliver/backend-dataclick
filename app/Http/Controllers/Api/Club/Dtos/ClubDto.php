<?php

namespace App\Http\Controllers\Api\Club\Dtos;

class ClubDto
{
    public $name;

    public function __construct(Object $object)
    {
        $this->name = $object->name;
    }
}