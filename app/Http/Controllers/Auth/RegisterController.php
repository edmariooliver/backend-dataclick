<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Api\User\Dtos\UserDto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\User\CreateUserAdminService;

class RegisterController extends Controller
{
    protected CreateUserAdminService $service;

    public function __construct(CreateUserAdminService $createUserService)
    {
        $this->service = $createUserService;
    }

    public function create(Request $request)
    {
        $dto = new UserDto($request);
        $this->service->execute($dto);
        return Response()->json("ok", 201);
    }
}
