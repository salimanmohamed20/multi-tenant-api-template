<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;
use App\Models\User;

Route::tenanted(function (Router $router) {

    $router->post("login", \App\Http\Controllers\Api\Auth\LoginController::class);
    $router->get('users', function () {
        return response()->json(User::with('organization')->get());
    });

    $router->post("teams", \App\Http\Controllers\Api\V1\StoreTeamController::class)->middleware('auth:sanctum');

});
