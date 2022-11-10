<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use App\Models\Club;

class ClubRepository implements RepositoryInterface
{
    
    /**
     * @var \App\Models\Club $entity
     */
    protected $entity;

    /**
     * 
     */
    public function __construct(Club $Club)
    {
        $this->entity = $Club;
    }

    /**
     * 
     */
    public function findById($id)
    {
        return $this->entity->where("id", $id)->first();
    }

    /**
     * 
     */
    public function findAll()
    {
        return $this->entity->select("*")->get();
    }

    /**
     * 
     */
    public function destroy(int $id)
    {
        return $this->entity->destroy($id);
    }

    /**
     * 
     */
    public function update(int $id, Array $Club)
    {
        if($this->entity->find($id) == NULL) {
            return false;
        }
        return $this->entity->where("id", $id)->update($Club);
    }

    /**
     * 
     */
    public function create(array $Club)    
    {
        return $this->entity->create($Club);
    }
}