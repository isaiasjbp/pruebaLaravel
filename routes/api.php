<?php

use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth']], function () use ($router) {

       $router->get('/users', [UserController::class ,'index']);
        $router->post('/users', 'UsersController@CreateUser');
        $router->delete('/users', 'UsersController@DropUser');
        $router->put('/users', 'UsersController@UpdateUser');
        $router->get('/users/{id_user}', 'UsersController@index');
    
    });

    Route::middleware('auth:api')->group( function () {
        Route::resource('users', UserController::class);
    });