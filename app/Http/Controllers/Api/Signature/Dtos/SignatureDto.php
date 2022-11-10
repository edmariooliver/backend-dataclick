<?php

namespace App\Http\Controllers\Api\Signature\Dtos;

class SignatureDto
{
    public $id;
    public $idUser;
    public $idClub;

    
    public function __construct(Object $object)
    {
        $this->id = $object->id;
        $this->idUser = $object->id_user;
        $this->idClub = $object->id_club;
    }
}