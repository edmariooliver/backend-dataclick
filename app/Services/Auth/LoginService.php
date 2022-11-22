<?php

namespace App\Services\Auth;

use App\Exceptions\UnauthorizedException;
use App\Utils\JWTUtils;
use App\Repositories\UserRepository;

class LoginService
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;    
    }

    public function execute(Array $credentials)
    {
        $user = $this->repository->findByEmail($credentials['email']);
        
        if(!$user->admin) {
            throw new UnauthorizedException();
        }

        if (! $token = auth()->attempt($credentials)) {
            throw new UnauthorizedException();
        }
        return JWTUtils::makeToken($token);
    }
}
