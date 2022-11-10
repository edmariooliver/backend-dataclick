<?php

namespace App\Services\Club;

use App\Exceptions\ClubNotFoundException;
use App\Repositories\ClubRepository;

class DestroyClubService
{
    protected ClubRepository $repository;

    public function __construct(ClubRepository $ClubRepository)
    {
        $this->repository = $ClubRepository;
    }

    public function execute($id)
    {
        $Clubs = $this->repository->findByid($id);
        if($Clubs == NULL) {
            throw new ClubNotFoundException();
        }
        $this->repository->destroy($Clubs->id);
    }
}
