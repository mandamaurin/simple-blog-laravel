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
    return view('frontend.index');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])
	->name('home');


Route::get('/users/list', [App\Http\Controllers\Admin\UserController::class, 'getUsers'])
	->name('user.list');
Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])
	->name('user.index');
Route::get('/roles/list', [App\Http\Controllers\Admin\RoleController::class, 'getRoles'])
	->name('role.list');
Route::resource('/role', App\Http\Controllers\Admin\RoleController::class);




