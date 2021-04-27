<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthAPIController;
use App\Http\Controllers\API\OrderAPIController;
use App\Http\Controllers\API\ClientAPIController;

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

Route::prefix('/auth')->group(function ()
{
    Route::post('/login', [AuthAPIController::class, 'login']);
    Route::get('/logout', [AuthAPIController::class, 'logout'])->middleware('auth:sanctum');
    Route::get('/verify', [AuthAPIController::class, 'verify'])->middleware('auth:sanctum');
});

Route::middleware('auth:sanctum')->group(function ()
{
    Route::prefix('/clients')->group(function ()
    {
        Route::get('/', [ClientAPIController::class, 'index']);
        Route::post('/', [ClientAPIController::class, 'store']);

        Route::get('/{id}', [ClientAPIController::class, 'show']);
        Route::post('/{id}', [ClientAPIController::class, 'update']);
        Route::delete('/{id}', [ClientAPIController::class, 'destroy']);
    });

    Route::prefix('/orders')->group(function ()
    {
        Route::get('/', [OrderAPIController::class, 'index']);
        Route::post('/', [OrderAPIController::class, 'store']);

        Route::get('/{id}', [OrderAPIController::class, 'show']);
        Route::post('/{id}', [OrderAPIController::class, 'update']);
        Route::delete('/{id}', [OrderAPIController::class, 'destroy']);
    });
});