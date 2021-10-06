<?php

namespace App\Http\Controllers\Api;

use App\Otp;
use App\User;
use App\Driver;
use App\Customer;
use App\Helpers\JazzOtp;
use Illuminate\Http\Request;
use App\Helpers\ApiResponser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\ForgotPasswordNotification;


class AuthController extends Controller
{
    use ApiResponser;

    /*
    |--------------------------------------------------------------------------
    | Magic Functions
    |--------------------------------------------------------------------------
    | magic funations like,construct
    */
    public function __counstuct()
    {
        $this->user = new User;
    }

    /*
    |--------------------------------------------------------------------------
    | Get Requests
    |--------------------------------------------------------------------------
    | Laravel Get Requests
    */


    /*
    |--------------------------------------------------------------------------
    | Post Requests
    |--------------------------------------------------------------------------
    | Larvel Post Request
    */
    public function otp(Request $request)
    {
        $attr = $request->validate([
            'phone' => 'required|unique:users,phone',
        ]);
        //creating otp token
        $otp = new Otp;
        $otp->setOtpToken();
        //getting otp token
        $otpToken = $otp->getOtpToken();
        //save to database
        $otp->save();
        //return response json with details
        return $this->success([
            'otp_details'=> $otp,
            'phone' => $attr['phone'],
            'redirect_url' => env('APP_URL').'/api/validate/otp',
        ],'Secret Otp send to your phone number '.$attr['phone']);

    }
    //validating otp
    public function validateOtp(Request $request)
    {
         $attr = $request->validate([
            'otp_token' => 'required',
            'phone' => 'required',
            'id' => 'required',
        ]);
        //matching records if exists in database
       $otp = Otp::where('id',$request->id)->where('otp_token',$request->otp_token)->first();
        if(!$otp){
            return response()->json(['error'=>'Otp is not valid']);
        }
        //if pass the verification otp then delete the token form database
        $otp->delete();
        //response json send this phone number to register url with hidden filed
        return $this->success([
            'phone' => $attr['phone'],
            'redirect_url' => env('APP_URL').'/api/register/user',
        ],'Otp Verified');
    }
    //register user as a customer role
    public function register(Request $request)
    {
        if($request->role == 'customer'){
        //validate the records if input field is empty
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:customers,email',
            'phone' => 'required|unique:users,phone',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'password'=> 'required|same:password_confirm',
            'role' => 'required',
        ]);
        }elseif($request->role == 'driver'){
            //validate the records if input field is empty
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:drivers,email',
            'phone' => 'required|unique:users,phone',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'role' => 'required',
        ]);
        }

         //save customer information in user table to get login
         $user = new User;
         $user->phone =$request->phone;
         $user->email =$request->email;
         if($request->role == 'customer'){
            $user->setCustomerRole();
         }elseif($request->role == 'driver'){
            $user->setDriverRole();
         }
         $user->password = Hash::make($request->password);
         $user->save();

        //save customer information in customer table
        if($request->role == 'customer'){
        $customer  = new Customer;
        $customer->user_id = $user->id;
        $customer->name = $request->name;
        $customer->country = $request->country;
        $customer->state = $request->state;
        $customer->city = $request->city;
        $customer->save();
        }elseif($request->role == 'driver'){
            $driver  = new Driver;
            $driver->user_id = $user->id;
            $driver->name = $request->name;
            $driver->email = $request->email;
            $driver->phone = $request->phone;
            $driver->country = $request->country;
            $driver->state = $request->state;
            $driver->city = $request->city;
            $driver->save();
        }
        $parts = explode('|',$user->createToken('OopoA83')->plainTextToken);
        $token = $parts[1];
        //return json reponse with secret_hash_token it will be used when login..
        if($request->role == 'customer' || $request->role == 'driver'){
            return $this->success([
                'secret_hash_token'=> $token,
                'redirect_url'=> env('APP_URL').'/api/login',
            ],'User Created Successfully');
        }else{
            return $this->error(['error'=>'occuring error when creating user']);
        }
    }

    //login customer
    public function login(Request $request)
    {
        $attr = $request->validate([
            'phone' => 'required',
            'password' => 'required'
        ]);
        //attempt password and phone matching our records or not
        if(!Auth::attempt(['phone' => $attr['phone'], 'password' => $attr['password']])){
            return $this->error([],'unauthorized',500);
        }

        //get user using phone from user table
        $user = User::where('phone',$attr['phone'])->first();
        //password verify challenge
        if(!Hash::check($request->password,$user->password,[])){
            return $this->error([],'credentials not match to our record',500);
        };
        //checking Role
        if($user->isCustomer()){
            $RedirectUrl =  env('APP_URL').'/api/customer/dashboard';
        }elseif($user->isDriver()){
            $RedirectUrl =  env('APP_URL').'/api/driver/dashboard';
        }
        //creating sanctum token
        $parts = explode('|',$user->createToken('OopoA83')->plainTextToken);
        $token = $parts[1];
        //return response in json .... user this secret_hash_token in header with Authorization -> Bearer token
        return $this->success([
            'secret_hash_token' => $token,
            'token_type' => 'Bearer',
            'redirect_url' => $RedirectUrl,
        ],'Login Successfully',200);
    }

    public function forgotPassword(Request $request)
    {
        $attr = $request->validate([
            'phone' => 'required',
        ]);
        $user = User::where('phone',$request->phone)->first();
        if($user){
        //creating otp token
        $otp = new Otp;
        $otp->setOtpToken();
        //getting otp token
        $otpToken = $otp->getOtpToken();
        //save to database
        $otp->save();
        //return response json with details
        return $this->success([
            'otp_details'=> $otpToken,
            'user' => $user,
            'phone' => $attr['phone'],
            'redirect_url' => env('APP_URL').'/api/reset/password',
        ],'Secret Otp send to your phone number '.$attr['phone']);

        }else{
            return $this->error([],'not match our record',405);
        }

    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'user_id' => 'required'
        ]);
        return $this->success([
            'user_id' => $request->id,
            'redirect_url' => env('APP_URL').'/api/update/password',
        ]);
    }

    public function updatePassword(Request $request)
    {
            $request->validate([
                'id' => 'required',
                'password' => 'required|same:password_confirm'
            ]);

            $user = User::where('id',$request->id)->first();
            if($user){
                $user->password = Hash::make($request->password);
                $user->update();
                return $this->success([],'password updated successfully',200);
            }else{
                return $this->error([],'missing information to update password');
            }
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers Functions
    |--------------------------------------------------------------------------
    | Helpers Functions
    */

}
