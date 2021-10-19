<?php

namespace App\Http\Controllers\Api;

use Image;
use App\File;
use App\User;
use App\Customer;
use Illuminate\Http\Request;
use App\Helpers\ApiResponser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class CustomerController extends Controller
{
    use ApiResponser;
    /*
    |--------------------------------------------------------------------------
    | Magic Functions
    |--------------------------------------------------------------------------
    | magic funations like,construct
    */


    /*
    |--------------------------------------------------------------------------
    | Get Requests
    |--------------------------------------------------------------------------
    | Laravel Get Requests
    */
    public function dashboard()
    {
        $user = auth()->user();
        return $this->success([
            'phone' => $user->phone,
            'email' => $user->email,
            'details' => $user->customer,
            'note' => 'You have to pass secret hash token to all request which are after authenticated user/loged in user'
        ], 'welcome to dashboard', 200);
    }

    public function editCustomer(Request $request)
    {

        $request->validate([
            'id' => 'required',
        ]);
        $user = User::where('id', $request->id)->first();
        $detail = $user->customer;
        return $this->success([
            'user_email' => $user->email,
            'user_phone' => $user->phone,
            'detail' => $detail,
            'redirect_url' => env('APP_URL') . '/api/update/customer',
        ], 'edit record');
    }

    public function updateCustomer(Request $request)
    {
        //validate the records if input field is empty
        $attr = $request->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required|unique:customers,email',
            'phone' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
        ]);

        //save customer information in user table to get login
        $user = User::where('id', $request->id)->first();
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->setCustomerRole();
        $user->update();
        //save customer information in customer table
        $customer  = $user->customer;
        $customer->name = $request->name;
        $customer->country = $request->country;
        $customer->state = $request->state;
        $customer->city = $request->city;
        $customer->update();

        //return json reponse with secret_hash_token it will be used when login..
        if ($customer && $user) {
            return $this->success([
                'user' => $user,
                'detail' => $customer,
            ], 'Customer Updated Successfully');
        } else {
            return $this->error(['error' => 'occuring error when creating customer']);
        }
    }

    public function updateCustomerPicture(Request $request)
    {

        $request->validate([
            'id' => 'required',
            'file' => 'required'
        ]);

        $filename="IMG".rand().".jpg";
        file_put_contents(public_path('images/uploads/profilepics/').$filename,base64_decode($request->file));
        $user = User::where('id', $request->id)->first();
        $customer  = $user->customer;
        $customer->file = $filename;
        $customer->save();
        return $this->success([
        ], 'Picture Updated Successfully', 200);

    }

    public function getCustomerPicture(Request $request)
    {

        $request->validate([
            'id' => 'required',
        ]);

        $user = User::where('id', $request->id)->first();
        $customer = $user->customer;
        $image_url =  env('APP_URL').'/images/uploads/profilepics/'.$customer->file;
        if ($image_url) {
            return $this->success([
                'user' => $user,
                'img_url' => $image_url,
            ], 'Picture Path got successfully', 200);
        } else {
            return $this->error([], 'picture not found with this user');
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Post Requests
    |--------------------------------------------------------------------------
    | Larvel Post Request
    */
    public function testUploadFile(Request $request)
    {
        //***** SINGLE IMAGE UPLOAD CODE */
        $request->validate([
            't1' => 'required',
            't2' => 'required',
            'upload' => 'required',
        ]);

        $filename="IMG".rand().".jpg";
        file_put_contents(public_path('images/uploads/profilepics/').$filename,base64_decode($request->upload));
        $file = new File;
        $file->user_id = 1;
        $file->file = $filename;
        $file->type = 'Profile Pic';
        $file->save();
        return response()->json('image upload successfully With Folder and Database');




    }



    /*
    |--------------------------------------------------------------------------
    | Helpers Functions
    |--------------------------------------------------------------------------
    | Helpers Functions
    */



}
