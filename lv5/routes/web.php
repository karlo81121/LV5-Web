<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ApplicationController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/users', function(){
    return view('users');
})->name('users');

Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');
Route::get('/student', [TaskController::class, 'indexAll'])->name('student');

Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users/edit', [UserController::class, 'update'])->name('users.update');

Route::post('/addtask', [TaskController::class, 'store']);
Route::get('/application/{id}', [ApplicationController::class, 'apply'])->name('student.application');
Route::get('/task/{id}/applications', [ApplicationController::class, 'index'])->name('student.applications');

Route::get('/application/accept/{id}/{name}', [ApplicationController::class, 'accept'])->name('accept.application');