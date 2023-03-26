<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemControler;



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

Route::post('register', [UserController::class, 'register']);
Route::get('userList', [UserController::class, 'userList']);
Route::post('login', [UserController::class, 'login']);
Route::post('additem', [ItemControler::class, 'addItem']);
Route::get('list', [ItemControler::class, 'list']);
Route::delete('delete/{id}', [ItemControler::class, 'delete']);
Route::get('product/{id}', [ItemControler::class, 'getItem']);
Route::put('updateItem/{id}', [ItemControler::class, 'updateItem']);
Route::put('updatePrice/{id}', [ItemControler::class, 'updatePrice']);
Route::put('updateWinner/{id}', [ItemControler::class, 'updateWinner']);
Route::get('search/{key}', [ItemControler::class, 'search']);



//






//Route::get('product/{id}', [ItemControler::class,'updateItem']);


