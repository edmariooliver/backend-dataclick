<?php

namespace App\Http\Controllers\Api\Club;

use App\Http\Controllers\Api\Club\Dtos\ClubDto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Club\CreateClubService;

class CreateClubController extends Controller
{
    protected CreateClubService $service;

    public function __construct(CreateClubService $createClubService)
    {
        $this->service = $createClubService;
    }

    public function create(Request $request)
    {
        $dto = new ClubDto($request);
        $this->service->execute($dto);
        return Response()->json("ok", 201);
    }
}
