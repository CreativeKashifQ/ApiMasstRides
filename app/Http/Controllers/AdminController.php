<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
    public function dashboard()
    {
        $user = new User;
        // dd($user->isAdministrator());
    	return view('admin.dashboard');
    }
}
