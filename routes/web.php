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
//->middleware('permission:employee-list')
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


Route::prefix('users')->group(function () {
    Route::get('list', [App\Http\Controllers\UserController::class, 'index'])->name('users/list');

    Route::get('edit/{user}', [App\Http\Controllers\UserController::class, 'edit'])->name('users/edit');
    Route::post('update/', [App\Http\Controllers\UserController::class, 'update'])->name('users/update');

    Route::post('delete', [App\Http\Controllers\UserController::class, 'delete'])->name('users/delete');

    Route::get('trash', [App\Http\Controllers\UserController::class, 'trashedIndex'])->name('users/trash');
    Route::post('restore', [App\Http\Controllers\UserController::class, 'restore'])->name('users/restore');

    Route::get('roles', [App\Http\Controllers\RolesController::class, 'index'])->name('users/roles');

    Route::get('roles/create', [App\Http\Controllers\RolesController::class, 'create'])->name('users/roles/create');
    Route::post('roles/store', [App\Http\Controllers\RolesController::class, 'store'])->name('users/role/store');
    
    Route::get('roles/edit/{role}', [App\Http\Controllers\RolesController::class, 'edit'])->name('users/roles/edit');
    Route::post('roles/update', [App\Http\Controllers\RolesController::class, 'update'])->name('users/roles/update');

    Route::post('roles/delete', [App\Http\Controllers\RolesController::class, 'delete'])->name('users/roles/delete');
});