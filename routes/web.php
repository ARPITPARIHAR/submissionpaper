<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FormatController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PublishController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'home']);
Route::get('/formating', [FormatController::class, 'format']);



// Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
// Route for the login page
Route::get('/login', [LoginController::class, 'login'])->name('login');


Route::get('/login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [LoginController::class, 'handleGoogleCallback']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::post('/upload', [FormatController::class, 'store'])->name('upload.store');
Route::get('/show-data', [FormatController::class, 'showData']);
Route::get('/show-data', [FormatController::class, 'showData'])->name('show-data');





 Route::middleware(['auth'])->group(function () {
Route::get('/publishing', [PublishController::class, 'publish']);
 });
Route::get('/download/{file}', [PublishController::class, 'download']);
Route::post('get-comment',[CommentController::class, 'getComment'])->name('get-comment');
Route::post('/submit-form', [CommentController::class, 'submitForm'])->name('submit.form');


