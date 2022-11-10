<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Club\{
    DestroyClubController,
    UpdateClubController,
    CreateClubController,
    GetClubController
};
use App\Http\Controllers\Api\User\{
    GetUserController,
    DestroyUserController,
    UpdateUserController, 
    CreateUserController
};
use App\Http\Controllers\Auth\{
    LoginController,
    RefreshController,
    MeController,
    LogoutController
};
use App\Http\Controllers\Api\Signature\{
    GetSignatureController,
    DestroySignatureController,
    UpdateSignatureController, 
    CreateSignatureController
};

use App\Http\Controllers\Api\Invoice\{
    PayController,

};

// ===============================================

Route::post('auth/login',   [LoginController::class, "index"]);
Route::post("user",         [CreateUserController::class, "create"]);
Route::post('logout',       [LogoutController::class, "index"]);
Route::post('refresh',      [RefreshController::class, "index"]);
Route::post('me',           [MeController::class, "index"]);

Route::get("user/{id}",         [GetUserController::class, "findById"]);
Route::get("user",              [GetUserController::class, "findAll"]);
Route::patch("user/{id}",       [UpdateUserController::class, "update"]);
Route::delete("user/{id}",      [DestroyUserController::class, "destroy"]);


Route::get("club/{id}",         [GetClubController::class, "findById"]);
Route::get("club",              [GetClubController::class, "findAll"]);
Route::patch("club/{id}",       [UpdateClubController::class, "update"]);
Route::delete("club/{id}",      [DestroyClubController::class, "destroy"]);
Route::post("club",             [CreateClubController::class, "create"]);

Route::get("signature/{id}",         [GetSignatureController::class, "findById"]);
Route::get("signature",              [GetSignatureController::class, "findAll"]);
Route::patch("signature/{id}",       [UpdateSignatureController::class, "update"]);
Route::delete("signature/{id}",      [DestroySignatureController::class, "destroy"]);
Route::post("signature",             [CreateSignatureController::class, "create"]);

Route::post("invoice/pay/{id}",      [PayController::class, "pay"]);