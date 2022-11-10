<?php

namespace App\Services\Club;

use App\Exceptions\InvalidClubDataException;
use App\Repositories\ClubRepository;
use App\Http\Controllers\Api\Club\Dtos\ClubDto;
use App\Validators\ClubValidator;

class CreateClubService
{
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
    public function execute(ClubDto $clubDto)
    {
        $validator = ClubValidator::run($clubDto, "CREATE");

        $club = [
            "name"  => $clubDto->name,
        ];
        
        /**
         * @var \Illuminate\Validation\Validator $validator
         */
        return $validator->fails() ? throw new InvalidClubDataException($validator->messages()) : $this->repository->create($club); 
    }
}
