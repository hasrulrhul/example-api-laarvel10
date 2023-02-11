<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/login', [AuthController::class, 'login']);

Route::group(['prefix' => '', 'namespace' => '',  'middleware' => 'auth:api'], function () {

    Route::get('/user/detail', [AuthController::class, 'detail']);
    Route::get('/auth/logout', [AuthController::class, 'logout']);

    // Route::group(['prefix' => '/users'], function () {
    // Route::resource('/users', 'UserController');
    // });
    // Route::group(['prefix' => '/roles'], function () {
    //     Route::get('/', 'RoleController@index')->name('api.roles.index');
    //     Route::post('/', 'RoleController@store')->name('api.roles.store');
    //     Route::get('/{id}', 'RoleController@show')->name('api.roles.show');
    //     Route::put('/{id}', 'RoleController@update')->name('api.roles.update');
    //     Route::delete('/{id}', 'RoleController@destroy')->name('api.roles.delete');
    // });

    // Route::group(['prefix' => '/users'], function () {
    //     Route::get('/', 'UserController@index')->name('api.users.index');
    //     Route::post('/', 'UserController@store')->name('api.users.store');
    //     Route::get('/{id}', 'UserController@show')->name('api.users.show');
    //     Route::put('/{id}', 'UserController@update')->name('api.users.update');
    //     Route::delete('/{id}', 'UserController@destroy')->name('api.users.delete');
    // });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
