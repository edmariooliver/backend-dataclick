<?php

namespace App\Services\User;

use App\Exceptions\UserNotFoundException;
use App\Repositories\SignatureRepository;
use App\Repositories\UserRepository;

class GetUserService
{
    protected UserRepository $userRepository;
    protected SignatureRepository $signatureRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository, SignatureRepository $signatureRepository)
    {
        $this->userRepository = $userRepository;
        $this->signatureRepository = $signatureRepository;
    }

    /**
     * 
     */
    public function execute(int $id = null)
    {
        $user = ($id == null) ? $this->findAll() : $this->findById(($id)); 

        if($user == null) {
            throw new UserNotFoundException();
        }
        return $user;
    }
    
    /**
     * get all users
     * @return 
     */
    public function findAll()
    {
        $users = $this->userRepository->findAll();
        return $users;
    }
    
    /**
     * get user by id 
     * @return 
     */
    public function findById(int $id)
    {
        $user = $this->userRepository->findById($id);
        
        if($user == null) {
            return $user;
        }

        return [
            $user, ["signatures" => $this->signatureRepository->findByUserId($id)]];
    }
}
