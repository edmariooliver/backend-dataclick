<?php

namespace App\Repositories;

use App\Models\Invoice;
use App\Repositories\Contracts\RepositoryInterface;
use App\Models\User;

class UserRepository implements RepositoryInterface
{
    
    /**
     * @var \App\Models\User $entity
     */
    protected $entity;

    /**
     * 
     */
    public function __construct(User $user)
    {
        $this->entity = $user;
    }

    /**
     * 
     */
    public function findById($id)
    {
        return $this->entity->where("id", $id)
                    ->where("admin", NULL)
                    ->first();
    }

    /**
     * 
     */
    public function findByEmailLogin($email)
    {
        return $this->entity->where("email", $email)
                    ->where("admin", 1)
                    ->first();
    }
    /**
     * 
     */
    public function findAll()
    {
        return $this->entity->select("*")
                    ->where("admin", NULL)
                    ->get();
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
    public function update(int $id, Array $user)
    {
        if($this->entity->find($id) == NULl) {
            return false;
        }
        return $this->entity->where("id", $id)->update($user);
    }

    /**
     * 
     */
    public function create(array $user)    
    {
        return $this->entity->create($user);
    }

}