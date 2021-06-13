<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthAPIController;
use App\Http\Controllers\API\OrderAPIController;
use App\Http\Controllers\API\ClientAPIController;
use App\Http\Controllers\API\AddressAPIController;

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

// Route::middleware('auth:sanctum')->group(function ()
// {
    Route::prefix('/clients')->group(function ()
    {
        Route::get('/', [ClientAPIController::class, 'index']);
        Route::post('/', [ClientAPIController::class, 'storeClient']);

        Route::get('/{id}', [ClientAPIController::class, 'show']);
        Route::put('/{id}', [ClientAPIController::class, 'updateClient']);
        Route::delete('/{id}', [ClientAPIController::class, 'destroy']);
    });

    Route::prefix('/orders')->group(function ()
    {
        Route::get('/', [OrderAPIController::class, 'index']);
        Route::post('/', [OrderAPIController::class, 'storeOrder']);

        Route::get('/{id}', [OrderAPIController::class, 'show']);
        Route::post('/{id}', [OrderAPIController::class, 'update']);
        Route::delete('/{id}', [OrderAPIController::class, 'destroy']);
    });

    Route::prefix('/addresses')->group(function ()
    {
        Route::get('/client/{client_id}', [AddressAPIController::class, 'list']);
        Route::post('/', [AddressAPIController::class, 'storeAddress']);
        Route::get('/{id}', [AddressAPIController::class, 'show']);
        Route::put('/{id}', [AddressAPIController::class, 'updateAddress']);
        Route::delete('/{id}', [AddressAPIController::class, 'destroy']);
    });
// });