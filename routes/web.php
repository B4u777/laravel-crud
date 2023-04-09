<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDataController;


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
Route::get('/', [UserDataController::class, 'index']);
Route::post('store-data', [UserDataController::class, 'StoreUser']);
Route::get('user-list', [UserDataController::class, 'UserList']);
Route::get('user-data-list', [UserDataController::class, 'getUserData']);
Route::post('user-edit-data', [UserDataController::class, 'getUserDataById']);
Route::post('delete-data', [UserDataController::class, 'DeleteUser']);






