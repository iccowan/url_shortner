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
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'completeLogin']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('register', [AuthController::class, 'completeRegister']);
Route::get('/logout', [AuthController::class, 'logout']);

// Redirect - this HAS to stay at the end
Route::get('{url_key}', [UrlController::class, 'redirect']);

