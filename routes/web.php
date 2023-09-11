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

Route::get('/', [App\Http\Controllers\ConsumeApiController::class, 'index'])->name('index');
Route::get('/ConsumeApi', [App\Http\Controllers\ConsumeApiController::class, 'ConsumeApi'])->name('ConsumeApi');
Route::put('/edit/{id}', [App\Http\Controllers\ConsumeApiController::class, 'edit'])->name('edit');
