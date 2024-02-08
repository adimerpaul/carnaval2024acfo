<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::get('/dancers',[App\Http\Controllers\DancerController::class, 'index']);
//dancersUpdate

Route::get('/cogs',[App\Http\Controllers\CogController::class, 'index']);
Route::post('/cogs',[App\Http\Controllers\CogController::class, 'update']);
Route::post('/login',[App\Http\Controllers\UserController::class, 'login']);

Route::group(['middleware'=>'auth:sanctum'],function (){
    Route::post('/logout',[App\Http\Controllers\UserController::class, 'logout']);
    Route::post('/dancersUpdate',[App\Http\Controllers\DancerController::class, 'update']);
    Route::get('/users',[App\Http\Controllers\UserController::class, 'users']);
});
