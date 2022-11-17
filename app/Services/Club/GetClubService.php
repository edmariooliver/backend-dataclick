<?php

namespace App\Services\Club;

use App\Exceptions\ClubNotFoundException;
use App\Repositories\ClubRepository;
use App\Repositories\SignatureRepository;

class GetClubService
{
    protected ClubRepository $clubRepository;
    protected SignatureRepository $signatureRepository;

    /**
     * @param ClubRepository $clubRepository
     */
    public function __construct(ClubRepository $clubRepository, SignatureRepository $signatureRepository)
    {
        $this->clubRepository = $clubRepository;
        $this->signatureRepository = $signatureRepository;
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
        $clubs = $this->clubRepository->findAll();
        return $clubs;
    }
    
    /**
     * get Club by id 
     * @return Array<Club>
     */
    public function findById(int $id)
    {
        $club = $this->clubRepository->findById($id);
        if($club == null) {
            return $club;
        }

        return [$club, ['signatures' => $this->signatureRepository->findByClubId($id)]];
    }
}
