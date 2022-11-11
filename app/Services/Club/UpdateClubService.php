<?php

namespace App\Services\Club;

use App\Http\Controllers\Api\Club\Dtos\ClubDto;
use App\Repositories\ClubRepository;
use App\Exceptions\InvalidClubDataException;
use App\Exceptions\ClubNotFoundException;
use App\Http\Controllers\Api\Club\Dtos\ResponseClubDto;
use App\Validators\ClubValidator;

class UpdateClubService
{
    /**
     * 
     */
    protected ClubRepository $repository;

    /**
     * 
     */
    public function __construct(ClubRepository $clubRepository)
    {
        $this->repository = $clubRepository;
    }

    /**
     * 
     */
    public function execute($id = null, ClubDto $clubDto)
    {
        $validator = ClubValidator::run($clubDto, "UPDATE");
        
        $clubArray  = [];

        if(!is_null($clubDto->name)) {
            $clubArray["name"] = $clubDto->name;
        }

        if($validator->fails()) {
            throw new InvalidClubDataException($validator->messages());
        }
        
        if ($this->repository->update($id, $clubArray)) {
            return new ResponseClubDto($this->repository->findById($id));
        }else{
            throw new ClubNotFoundException();
        }
    }
}
