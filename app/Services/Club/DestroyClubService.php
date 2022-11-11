<?php

namespace App\Services\Club;

use App\Exceptions\ClubNotFoundException;
use App\Repositories\ClubRepository;

class DestroyClubService
{
    protected ClubRepository $repository;

    public function __construct(ClubRepository $clubRepository)
    {
        $this->repository = $clubRepository;
    }

    public function execute($id)
    {
        $clubs = $this->repository->findByid($id);
        if($clubs == NULL) {
            throw new ClubNotFoundException();
        }
        $this->repository->destroy($clubs->id);
    }
}
