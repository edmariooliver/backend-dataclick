<?php

namespace App\Http\Controllers\Api\Club;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Club\DestroyClubService;

class DestroyClubController extends Controller
{
    protected DestroyClubService $service;

    public function __construct(DestroyClubService $destroyClubService)
    {
        $this->service = $destroyClubService;
    }

    public function destroy(Request $request)
    {
        $this->service->execute($request->id);
        return response()->json(["ok"], 200);
    }
}
