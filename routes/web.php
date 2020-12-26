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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth'], 'prefix' => '/pedidos'], function () {
    Route::get('/ativos', '\App\Http\Controllers\OrderController@index')
        ->name('orders.index');

    Route::get('/novo', '\App\Http\Controllers\OrderController@create')
        ->name('orders.create');

    Route::get('/editar/{id}', '\App\Http\Controllers\OrderController@edit')
        ->name('orders.edit');

    Route::get('/inativar/{id}', '\App\Http\Controllers\OrderController@destroy')
        ->name('orders.delete');

    Route::get('/inativos', '\App\Http\Controllers\Inactive\OrderController@index')
        ->name('orders.inactives.index');
});

Route::group(['middleware' => ['auth'], 'prefix' => '/clientes'], function ()
{
    Route::get('/ativos', '\App\Http\Controllers\ClientController@index')
        ->name('clients.index');

    Route::get('/novo', '\App\Http\Controllers\ClientController@create')
        ->name('clients.create');

    Route::get('/editar/{id}', '\App\Http\Controllers\ClientController@edit')
        ->name('clients.edit');

    Route::get('/inativar/{id}', '\App\Http\Controllers\ClientController@destroy')
        ->name('clients.delete');

    Route::get('/inativos', '\App\Http\Controllers\Inactive\ClientController@index')
        ->name('clients.inactives.index');
});

// Route::get('/menu', function ()
// {
//     return view('entities.menu.index');
// })->name('menu.index');

// Route::get('/{any}', function ()
// {
//     return redirect()->guest('/menu');
// });