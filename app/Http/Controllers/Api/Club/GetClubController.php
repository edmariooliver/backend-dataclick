<?php

namespace App\Http\Controllers\Api\Club;

use App\Http\Controllers\Controller;
use App\Services\Club\GetClubService;
use Illuminate\Http\Request;

class GetClubController extends Controller
{
    protected GetClubService $service;

    public function __construct(GetClubService $getClubService)
    {
        $this->service = $getClubService;
    }

    public function findAll()
    {
        return response()->json($this->service->execute(), 200);
    }

    public function findById(Request $request)
    {
        return response()->json($this->service->execute($request->id), 200);
    }
}
