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
    return redirect()->route('menu.index');
});

Route::get('/cardapio', function ()
{
    $args = array (
        'scene' => 'menu.index'
    );

    return view('entities.menu.index', compact('args'));
})->name('menu.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth'], 'prefix' => '/pedidos'], function () {
    Route::get('/', '\App\Http\Controllers\OrderController@index')
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
    Route::get('/', [\App\Http\Controllers\ClientController::class, 'index'])
        ->name('clients.index'); # list

    Route::get('/novo', [\App\Http\Controllers\ClientController::class, 'create'])
        ->name('clients.create'); # create

    Route::post('/novo', [\App\Http\Controllers\ClientController::class, 'store'])
        ->name('clients.store'); # store

    Route::get('/editar/{id}', [\App\Http\Controllers\ClientController::class, 'edit'])
        ->name('clients.edit'); # edit

    Route::post('/editar/{id}', [\App\Http\Controllers\ClientController::class, 'update'])
        ->name('clients.update'); # update

    Route::get('/inativar/{id}', [\App\Http\Controllers\ClientController::class, 'destroy'])
        ->name('clients.destroy'); # destroy

    // Route::resource('clients', \App\Http\Controllers\ClientController::class);

    # client's addresses

    Route::get('/enderecos/{client_id}', [\App\Http\Controllers\AddressController::class, 'index'])
        ->name('clients.addresses.index'); # list

    Route::get('/enderecos/novo/{client_id}', [\App\Http\Controllers\AddressController::class, 'create'])
        ->name('clients.addresses.create'); # create

    Route::post('/enderecos/novo/{client_id}', [\App\Http\Controllers\AddressController::class, 'store'])
        ->name('clients.addresses.create'); # store

    Route::get('enderecos/editar/cliente/{client_id}/endereco/{address_id}', [\App\Http\Controllers\AddressController::class, 'edit'])
        ->name('client.addresses.edit'); # edit

    Route::post('enderecos/editar/cliente/{client_id}/endereco/{address_id}', [\App\Http\Controllers\AddressController::class, 'update'])
        ->name('client.addresses.edit'); # update

    Route::get('enderecos/inativar/cliente/{client_id}/endereco/{address_id}', [\App\Http\Controllers\AddressController::class, 'destroy'])
        ->name('client.addresses.delete'); # destroy

    // Route::resource(
    //     'enderecos', 
    //     \App\Http\Controllers\AddressController::class,
    //     array (
    //         'names' => array (
    //             'index' => 'clients.addresses.show',
    //         )
    //     )
    // );

    # inactivated clients

    Route::get('/inativos', '\App\Http\Controllers\Inactive\ClientController@index')
        ->name('clients.inactives.index');

    Route::get('ativar/{id}', '\App\Http\Controllers\Inactive\ClientController@update')
        ->name('clients.inactives.update');
});