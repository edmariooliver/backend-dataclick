<?php

namespace App\Services\User;

use App\Exceptions\InvalidUserDataException;
use App\Repositories\UserRepository;
use App\Http\Controllers\Api\User\Dtos\UserDto;
use App\Validators\AdminValidator;
use Illuminate\Support\Facades\Hash;

class CreateUserAdminService
{
    protected UserRepository $repository;

    /**
     * 
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    /**
     * 
     */
    public function execute(UserDto $userDto)
    {
        $validator = AdminValidator::run($userDto, "CREATE");

        $user = [
            "name"  => $userDto->name,
            "email" => $userDto->email,
            "password"  => Hash::make($userDto->password),
            "admin"     => 1
        ];
        
        /**
         * @var \Illuminate\Validation\Validator $validator
         */
        return $validator->fails() ? throw new InvalidUserDataException($validator->messages()) : $this->repository->create($user); 
    }
}
