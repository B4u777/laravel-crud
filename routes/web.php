<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiginController;


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
Route::get('/', [SiginController::class, 'index']);

Route::post('store-data', [SiginController::class, 'store']);
Route::get('list', [SiginController::class, 'list']);
Route::get('data-list', [SiginController::class, 'getdata']);
Route::post('edit-list', [SiginController::class, 'edit']);
Route::post('delete-data', [SiginController::class, 'destroy']);






