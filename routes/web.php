<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlumniController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\GmailController;
use App\Http\Controllers\AlumnilogController;
use App\Http\Controllers\EmploymentdataController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
|
*/
//route login
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'process']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

// route dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

//route Alumni
Route::resource('/alumni', AlumniController::class)->middleware('auth');


Route::get('/changeAccount', [AccountController::class, 'showChangeAccountForm'])->name('changeAccount');


Route::middleware(['auth'])->group(function () {
    Route::get('/user/{id_user}/edit', [AccountController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id_user}', [AccountController::class, 'update'])->name('user.update');
});
Route::post('sendmail/', [GmailController::class, 'Send'])->name('sendmail.send');


// Route::post('/surveyform', [EmploymentdataController::class, 'store'])->name('store');
Route::post('/alumni/store/{alumni}', [EmploymentdataController::class, 'store'])->name('store');
Route::get('/alumnilog', [AlumnilogController::class, 'showLoginForm'])->name('alumnilog');
Route::post('/alumni/signin', [AlumnilogController::class, 'signin'])->name('alumni.signin');
Route::get('/surveyform', [AlumnilogController::class, 'showSurveyForm'])->name('surveyform');

Route::get('/response', function () {
    return view('response');
})->name('response');
Route::get('/employmentdata', [EmploymentdataController::class, 'index'])->name('employmentdata.index');
Route::get('/dashboard/countSubmissions', [DashboardController::class, 'countSubmissions'])->name('dashboard.countSubmissions');

Route::get('/employment-data', [DashboardController::class, 'data'])->name('data');
