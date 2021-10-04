<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register',[UserController::class,'register']);
Route::post('login',[UserController::class,'login']);
Route::post('changePassword',[UserController::class,'changePassword']);
Route::post('upload-image',[ProfileController::class,'uploadImage']);
Route::post('upload-profile',[ProfileController::class,'uploadProfile']);
Route::get('display',[ProfileController::class,'display']);
Route::post('upload',[ProfileController::class,'upload']);
Route::get('users',[UserController::class,'users']);
