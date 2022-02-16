<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'redirects'])->middleware('auth', 'verified');
// doctor ifo 
Route::get('/add_doctors', [AdminController::class, 'add_doctors']);
Route::post('/add_doctor', [AdminController::class, 'add_doctor']);

// appoitment 
Route::post('/appoitment', [HomeController::class, 'appoitment']);
Route::get('/my_appointments', [HomeController::class, 'my_appointments']);
Route::get('/cancel_appointment/{id}', [HomeController::class, 'cancel_appointment']);
// admin appoinments 
Route::get('/showAppointments', [AdminController::class, 'showAppointments']);
Route::get('/approved/{id}', [AdminController::class, 'approved']);
Route::get('/Cancled/{id}', [AdminController::class, 'Cancled']);

// All Doctors 
Route::get('/showAllDoctors', [AdminController::class, 'showAllDoctors']);
Route::get('/deleteDoctor/{id}', [AdminController::class, 'deleteDoctor']);
Route::get('/updateDoctor/{id}', [AdminController::class, 'updateDoctor']);
Route::post('/EditDoctor/{id}', [AdminController::class, 'EditDoctor']);

// sending mail to the user 
Route::get('/SendMail/{id}', [AdminController::class, 'SendMail']);
Route::post('/SendEmail/{id}', [AdminController::class, 'SendEmail']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
