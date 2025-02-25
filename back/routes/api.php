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

Route::get('/',function (){
    return 'Hola mundo';
});
Route::get('/dancers',[App\Http\Controllers\DancerController::class, 'index']);

Route::get('/cogs',[App\Http\Controllers\CogController::class, 'index']);
Route::get('/lineas',[App\Http\Controllers\CogController::class, 'lineas']);
Route::post('/cogs',[App\Http\Controllers\CogController::class, 'update']);
Route::post('/login',[App\Http\Controllers\UserController::class, 'login']);
Route::post('/updateData',[App\Http\Controllers\UserController::class, 'updateData']);
Route::get('/dancers/{id}',[App\Http\Controllers\DancerController::class, 'show']);

Route::group(['middleware'=>'auth:sanctum'],function (){
    Route::post('/logout',[App\Http\Controllers\UserController::class, 'logout']);
    Route::post('/dancersUpdate',[App\Http\Controllers\DancerController::class, 'update']);
    Route::post('/dancersUpdateOne',[App\Http\Controllers\DancerController::class, 'updateOne']);
    Route::get('/users',[App\Http\Controllers\UserController::class, 'users']);
    Route::get('/me',[App\Http\Controllers\UserController::class, 'me']);
});
