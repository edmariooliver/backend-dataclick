<?php

namespace App\Http\Controllers\Api\Club;

use App\Http\Controllers\Api\Club\Dtos\ClubDto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Club\UpdateClubService;

class UpdateClubController extends Controller
{
    protected UpdateClubService $service;

    public function __construct(UpdateClubService $updateClubService)
    {
        $this->service = $updateClubService;
    }

    /**
     * 
     */
    public function update(Request $request)
    {
        $dto = new ClubDto($request);
        return Response()->json(
            $this->service->execute($request->id, $dto),
            200
        );
    }
}
