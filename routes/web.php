<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\CategoryController;
use App\Http\controllers\Controller;
use App\Http\controllers\DashboardController;
use App\Http\controllers\subCategoryController;
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

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('home');

// Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index']);

Route::resource('category', CategoryController::class);
Route::resource('sub-category', subCategoryController::class);
Route::resource('/dash-b', DashboardController::class);

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
