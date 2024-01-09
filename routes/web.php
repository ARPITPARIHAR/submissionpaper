<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FormatController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PublishController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminActionsController;
use LDAP\Result;

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


 



// Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
// Route for the login page
// Route::get('/login', [LoginController::class, 'login'])->name('login');

// google login....
 Route::get('/login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
 Route::get('/login/google/callback', [LoginController::class, 'handleGoogleCallback']);
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// faccebook login...
Route::get('login/facebook', [LoginController::class, 'redirectToFacebook'])->name('facebook.login');
Route::get('login/facebook/callback', [LoginController::class, 'handleFacebookCallback']);


//format.................

//  Route::middleware(['auth', 'client'])->group(function () {
//     Route::get('/formating', [FormatController::class, 'format']);
//  });
//  Route::middleware(['auth'])->group(function () {
    Route::get('/formating', [FormatController::class, 'format']);
// });


Route::get('/multi', [FormatController::class, 'multi']);
Route::post('/upload', [FormatController::class, 'store'])->name('upload.store');
Route::get('/show-data', [FormatController::class, 'showData']);
Route::get('/show-data', [FormatController::class, 'showData'])->name('show-data');

Route::delete('/users/{id}', [FormatController::class, 'destroy'])->name('users.delete');








//publish....................

  //  Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/publishing', [PublishController::class, 'publish']);
  // });

Route::get('/download/{file}', [PublishController::class, 'download']);
// Route::get('/admin/remove-user/{userId}', [PublishController::class, 'removeUser'])->name('admin.removeUser');




Route::post('get-comment',[CommentController::class, 'getComment'])->name('get-comment');
Route::post('/submit-form', [CommentController::class, 'submitForm'])->name('submit.form');
Route::post('update-status',[CommentController::class, 'updateStatus'])->name('update-status');



  
//admin.................

  Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/adminusertable', [AdminActionsController::class, 'showUserTable'])->name('adminusertable');
    //  Route::get('/publishing', [PublishController::class, 'publish']);
        //  Route::get('/formating', [FormatController::class, 'format']);
    });


    Route::get('/adminchangepassword{userId}', [AdminActionsController::class, 'showChangePasswordForm'])->name('admin.changePassword');

    Route::post('/admin/change-password/{userId}', [AdminActionsController::class, 'processChangePassword'])
    ->name('admin.processChangePassword');
    Route::get('/admin/remove-user/{userId}', [AdminActionsController::class, 'removeUser'])->name('admin.removeUser');
    Route::post('/admin/assign-role/{userId}', [AdminActionsController::class, 'assignRole'])->name('admin.assignRole');

//login.............
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

 
 
  
 
    
  
    
  
