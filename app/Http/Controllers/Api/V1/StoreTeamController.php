<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\TeamRequest;
use Illuminate\Http\Request;
use App\Actions\StoreTeam;
use App\Models\Organization;
use Sprout\Attributes\CurrentTenant;
use App\Http\Resources\V1\TeamResource;



class StoreTeamController extends Controller
{
    //

public function __construct(#[CurrentTenant]private Organization $organization)
{}

    public function  __invoke(TeamRequest $request, StoreTeam $storeTeam)
    {
        $team = $storeTeam->handle($request->payLoads());

        return response()->json([
            'data' => new TeamResource($team),
        ]);
    }
}
