<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//auth user
Route::middleware('auth:sanctum')->group(function (){
    //customer routes
    Route::get('/customer/dashboard',[App\Http\Controllers\Api\CustomerController::class,'dashboard']);
    Route::post('/edit/customer',[App\Http\Controllers\Api\CustomerController::class,'editCustomer']);
    Route::post('/update/customer',[App\Http\Controllers\Api\CustomerController::class,'updateCustomer']);
    // Route::post('/update/profile/picture',[App\Http\Controllers\Api\CustomerController::class,'updateProfilePicture']);
    Route::post('/get/profile/picture',[App\Http\Controllers\Api\CustomerController::class,'getProfilePicture']);
    //driver Routes
    Route::get('/driver/dashboard',[App\Http\Controllers\Api\DriverController::class,'dashboard']);

});
Route::post('/update/profile/picture',[App\Http\Controllers\Api\CustomerController::class,'updateProfilePicture']);
Route::post('/test/profile/picture',[App\Http\Controllers\Api\CustomerController::class,'testUploadFile']);


//register and login
Route::post('otp',[App\Http\Controllers\Api\AuthController::class,'otp']);
Route::post('validate/otp',[App\Http\Controllers\Api\AuthController::class,'validateOtp']);
Route::post('register/user',[App\Http\Controllers\Api\AuthController::class,'register']);
Route::post('login/user',[App\Http\Controllers\Api\AuthController::class,'login']);
Route::post('forgot/password',[App\Http\Controllers\Api\AuthController::class,'forgotPassword']);
Route::post('reset/password',[App\Http\Controllers\Api\AuthController::class,'resetPassword']);
Route::post('update/password',[App\Http\Controllers\Api\AuthController::class,'updatePassword']);


//vehicle Request
Route::post('vehicle/request',[App\Http\Controllers\Api\VehicleRequestController::class,'vehicleRequest']);




