<?php

namespace App\Services\Club;

use App\Exceptions\ClubNotFoundException;
use App\Repositories\ClubRepository;
use App\Models\Club;

class GetClubService
{
    protected ClubRepository $repository;

    /**
     * @param ClubRepository $ClubRepository
     */
    public function __construct(ClubRepository $clubRepository)
    {
        $this->repository = $clubRepository;
    }

    /**
     * 
     */
    public function execute(int $id = null)
    {
        $club = ($id == null) ? $this->findAll() : $this->findById(($id)); 

        if($club == null) {
            throw new ClubNotFoundException();
        }
        return $club;
    }
    
    /**
     * get all Clubs
     * @return 
     */
    public function findAll()
    {
        $clubs = $this->repository->findAll();
        return $clubs;
    }
    
    /**
     * get Club by id 
     * @return Club
     */
    public function findById(int $id)
    {
        return $this->repository->findById($id);
    }
}
