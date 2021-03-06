<?php

use Laravel\Nova\Nova;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReviewController;

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

Route::redirect('/', Nova::path());

Route::get('/register', [RegisterController::class, 'showRegister']);
Route::get('/admin-register', [RegisterController::class, 'showAdminRegister']);
Route::post('/register', [RegisterController::class, 'postRegister']);
Route::post('/admin-register', [RegisterController::class, 'postAdminRegister']);

Route::get('/reviews/{user}', [ReviewController::class, 'getReviews']);
Route::post('/reviews', [ReviewController::class, 'postReview']);
