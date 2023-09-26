<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\RoomtypeController;
use App\Http\Controllers\backend\RoomController;
use App\Http\Controllers\backend\CustomerController;
use App\Http\Controllers\backend\StaffDepartmentController;
use App\Http\Controllers\backend\StaffController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\BookingController;

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

Route::get('/', function () {
    return view('welcome');
});

//Admin Route
Route::get('/dashboard', function () {
    return view('backend.index');
});


//RoomType Route
Route::resource('/roomtype',RoomtypeController::class);
Route::get('/roomtype/{id}/delete',[RoomtypeController::class,'destroy']);

//Roomes Images Delete
Route::get('/roomtypeimage/{id}/delete',[RoomtypeController::class,'destroy_img']);


//Room Route
Route::resource('/rooms',RoomController::class);
Route::get('/rooms/{id}/delete',[RoomController::class,'destroy']);

//Customer Route
Route::resource('/customers',CustomerController::class);
Route::get('/customers/{id}/delete',[CustomerController::class,'destroy']);

//Department Route
Route::resource('/department',StaffDepartmentController::class);
Route::get('/department/{id}/delete',[StaffDepartmentController::class,'destroy']);

//Staff Route
Route::resource('/staff',StaffController::class);
Route::get('/staff/{id}/delete',[StaffController::class,'destroy']);

//Staff Payments Route
Route::get('/staff/payments/{id}',[StaffController::class,'all_payments']);
Route::get('/staff/payment/{id}/add',[StaffController::class,'add_payment']);
Route::post('/staff/payment/{id}',[StaffController::class,'save_payment']);
Route::get('/staff/payment/{id}/{staff_id}/delete', [StaffController::class, 'delete_payment']);


//Bookings Route
Route::resource('/booking',BookingController::class);
Route::get('/booking/{id}/delete',[BookingController::class,'destroy']);










//Admin Login Route
Route::get('/login',[AdminController::class,'login']);
Route::post('/login',[AdminController::class,'check_login']);
Route::get('/logout',[AdminController::class,'logout']);

