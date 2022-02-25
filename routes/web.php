<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UrlController;

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

// Landing
Route::get('/', [MainController::class, 'index']);
Route::get('/about', [MainController::class, 'about']);

//Auth
Route::get('/login', [AuthController::class, 'login'])->middleware('auth.out');
Route::post('/login', [AuthController::class, 'completeLogin'])->middleware('auth.out');
Route::get('/register', [AuthController::class, 'register'])->middleware('auth.out');
Route::post('register', [AuthController::class, 'completeRegister'])->middleware('auth.out');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth.in');

// Account
Route::get('/user', [AuthController::class, 'showUser'])->middleware('auth.in');
Route::post('/user/save', [AuthController::class, 'saveUser'])->middleware('auth.in');
Route::post('/user/save/password', [AuthController::class, 'saveUserPassword'])->middleware('auth.in');

// Links
Route::get('/user/links', [UrlController::class, 'index'])->middleware('auth.in');
Route::post('/user/links/create', [UrlController::class, 'create'])->middleware('auth.in');
Route::get('/user/links/edit', [UrlController::class, 'edit'])->middleware('auth.in');
Route::get('/user/links/delete', [UrlController::class, 'delete'])->middleware('auth.in');

// Redirect - this HAS to stay at the end
Route::get('{url_key}', [UrlController::class, 'redirect']);

