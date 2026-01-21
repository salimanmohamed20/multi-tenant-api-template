<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;
use App\Models\User;

Route::tenanted(function (Router $router) {

    $router->get('users', function () {
        return response()->json(User::all());
    });

    $router->post("login", \App\Http\Controllers\Api\Auth\LoginController::class);

});
