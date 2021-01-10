<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function ()
{
    return view('entities.menu.index');
})->name('menu.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth'], 'prefix' => '/pedidos'], function () {
    Route::get('/ativos', '\App\Http\Controllers\OrderController@index')
        ->name('orders.index');

    Route::get('/novo', '\App\Http\Controllers\OrderController@create')
        ->name('orders.create');
    Route::post('/novo', '\App\Http\Controllers\OrderController@store')
        ->name('orders.store');

    Route::get('/editar/{id}', '\App\Http\Controllers\OrderController@edit')
        ->name('orders.edit');

    Route::get('/inativar/{id}', '\App\Http\Controllers\OrderController@destroy')
        ->name('orders.delete');

    Route::get('/inativos', '\App\Http\Controllers\Inactive\OrderController@index')
        ->name('orders.inactives.index');
});

Route::group(['middleware' => ['auth'], 'prefix' => '/clientes'], function ()
{
    Route::get('/ativos', [\App\Http\Controllers\ClientController::class, 'index'])
        ->name('clients.index');

    Route::get('/novo', [\App\Http\Controllers\ClientController::class, 'create'])
        ->name('clients.create');

    Route::post('/novo', [\App\Http\Controllers\ClientController::class, 'store'])
        ->name('clients.store');

    Route::get('/editar/{id}', [\App\Http\Controllers\ClientController::class, 'edit'])
        ->name('clients.edit');

    Route::post('/editar/{id}', [\App\Http\Controllers\ClientController::class, 'update'])
        ->name('clients.update');

    Route::get('/inativar/{id}', [\App\Http\Controllers\ClientController::class, 'destroy'])
        ->name('clients.delete');

    # client's addresses

    Route::get('/enderecos/{client_id}', '\App\Http\Controllers\AddressController@show')
        ->name('clients.addresses.show');

    Route::get('enderecos/editar/{id}', '\App\Http\Controllers\AddressController@edit')
        ->name('client.addresses.edit');

    Route::post('enderecos/editar/{id}', '\App\Http\Controllers\AddressController@update')
        ->name('client.addresses.edit');

    Route::get('enderecos/inativar/{id}', '\App\Http\Controllers\AddressController@destroy')
        ->name('client.addresses.delete');

    # inactivated clients

    Route::get('/inativos', '\App\Http\Controllers\Inactive\ClientController@index')
        ->name('clients.inactives.index');

    Route::get('ativar/{id}', '\App\Http\Controllers\Inactive\ClientController@update')
        ->name('clients.inactives.update');
});