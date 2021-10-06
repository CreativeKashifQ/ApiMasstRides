<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | GET REQUESTS
    |--------------------------------------------------------------------------
    | get will be defined here.
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
    /*
    |--------------------------------------------------------------------------
    | POST REQUESTS
    |--------------------------------------------------------------------------
    | posts requests will be define here
    */


    /*
    |--------------------------------------------------------------------------
    | Helper Functions
    |--------------------------------------------------------------------------
    | Helper functions will be defined  here..
    */


}
