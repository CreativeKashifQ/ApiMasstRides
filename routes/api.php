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
    Route::post('/update/customer/picture',[App\Http\Controllers\Api\CustomerController::class,'updateCustomerPicture']);
    Route::post('/get/customer/picture',[App\Http\Controllers\Api\CustomerController::class,'getCustomerPicture']);

    //DRIVER ROUTES TO UPLOAD OR POST IMAGES
    //driver cnic picture front and back
    Route::post('/driver/cnic/front/picture',[App\Http\Controllers\Api\DriverController::class,'driverFrontCnicPicture']);
    Route::post('/driver/cnic/back/picture',[App\Http\Controllers\Api\DriverController::class,'driverBackCnicPicture']);
    //driver lisence front and back
    Route::post('/driver/lisence/front/picture',[App\Http\Controllers\Api\DriverController::class,'driverFrontLisencePicture']);
    Route::post('/driver/lisence/back/picture',[App\Http\Controllers\Api\DriverController::class,'driverBackLisencePicture']);
    //driver profile pic upload
    Route::post('/driver/picture',[App\Http\Controllers\Api\DriverController::class,'driverPicture']);

    //DRIVER ROUTES TO GET IMAGES PATHS
    //cnic front and back
    Route::post('/get/driver/front/cnic/picture',[App\Http\Controllers\Api\DriverController::class,'getDriverCnicFrontPicture']);
    Route::post('/get/driver/back/cnic/picture',[App\Http\Controllers\Api\DriverController::class,'getDriverCnicBackPicture']);
    //lisence front and back
    Route::post('/get/driver/front/lisence/picture',[App\Http\Controllers\Api\DriverController::class,'getDriverLisenceFrontPicture']);
    Route::post('/get/driver/back/lisence/picture',[App\Http\Controllers\Api\DriverController::class,'getDriverLisenceBackPicture']);
    //get diver profile picture
    Route::post('/get/driver/picture',[App\Http\Controllers\Api\DriverController::class,'getDriverPicture']);


    Route::get('/driver/dashboard',[App\Http\Controllers\Api\DriverController::class,'dashboard']);


});
Route::post('/test/profile/picture',[App\Http\Controllers\Api\CustomerController::class,'testUploadFile']);

Route::middleware('guest')->group(function(){
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
    Route::post('upload/vehicle/request/images',[App\Http\Controllers\Api\VehicleRequestController::class,'uploadVehicleRequestImages']);

    //Driver Register
    Route::post('register/driver',[App\Http\Controllers\Api\DriverController::class,'registerDriver']);
    Route::post('uploads/driver/images',[App\Http\Controllers\Api\DriverController::class,'uploadDriverImages']);
    Route::post('get/driver/images',[App\Http\Controllers\Api\DriverController::class,'getDriverImages']);
});








