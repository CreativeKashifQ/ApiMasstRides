<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdmincontrolController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         try {

             return view('admin.admincontrol.index');
        } catch (\Exception $e) {
            return $e->getmessage();
        }
    }


}
