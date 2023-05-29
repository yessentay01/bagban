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
    return view('pages.welcome.welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/plants', [App\Http\Controllers\PlantsController::class, 'index'])->name('plants');
Route::get('/watering', [App\Http\Controllers\WateringController::class, 'index'])->name('watering');
Route::get('/articles', [App\Http\Controllers\ArticlesController::class, 'index'])->name('articles');
Route::get('/bagban', [App\Http\Controllers\BagbanController::class, 'index'])->name('bagban');
