<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;

class UserController extends Controller
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
        $users = User::all();
        $roles = Role::all();
        return view('admin.users.index',compact('users','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $users = User::all();
            $roles = Role::all();
            return view('admin.users.create',compact('users','roles'));
            return response()->json();
        } catch (\Exception $e) {
            return response()->json($e->getmessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $request->validate([
            'name' => 'required',
            'roles'=> 'required',
            'email'=> 'required|unique:users',
            'password' => 'required|confirmed',
        ]);

        try {
            $user = new User;
            $user->name =$request->name;
            $user->email = $request->email;
            $user->password = md5($request->password);
            $user_franchises = $request->franchisesValue;
            $user->permissions = [

            ];
            if ($user->save()) {
            	$roles = explode(',', $request->roles);
            	$user->roles()->attach($roles);
                return response()->json('User Added Successfully');
            }else{
                return response()->json('Occuring Error');
            }
        } catch (\Exception $e) {
            return response()->json($e->getmessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        try {
            $edituser = User::where('id',$request->id)->first();
            $roles = Role::all();
            return view('admin.users.edit',compact('edituser','roles'));
        } catch (\Exception $e) {
            return response()->json($e->getmessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'roles'=> 'required',
        ]);

        try {
            $user = User::where('id',$request->id)->first();
            $user->name =$request->name;
            $user->email = $request->email;
            if ($user->save()) {
                $user->roles()->detach();
                $roles = explode(',', $request->roles);
                $user->roles()->attach($roles);
                return response()->json('User Updated Successfully');
            }else{
                return response()->json('Occuring Error');
            }
        } catch (\Exception $e) {
            return response()->json($e->getmessage());
        }
    }

    /**
     * Trash the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function trash(Request $request)
    {

        try {
            $user = User::where('id',$request->id)->first();
            if ($user->delete()) {
                return response()->json('User Trashed Successfully');
            }
        } catch (\Exception $e) {
            return response()->json($e->getmessage());
        }
    }

    /**
     * Trahsed the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function trashed(Request $request)
    {
        try {

            $users = User::onlyTrashed()->get();
            return view('admin.users.trashed',compact('users'));
        } catch (\Exception $e) {
            return response()->json($e->getmessage());
        }
    }


    /**
     * Trahsed the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function trashedCreate(Request $request)
    {
        try {
            $users = User::onlyTrashed()->get();
            return view('admin.users.trashedcreate',compact('users'));
            return response()->json();
        } catch (\Exception $e) {
            return response()->json($e->getmessage());
        }
    }


    /**
     * Trahsed the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)
    {
        try {
            $user = User::withTrashed()->findOrFail($request->id);
            if ($user->restore()) {
                return response()->json('User Restore Successfully');
            }
        } catch (\Exception $e) {
            return response()->json($e->getmessage());
        }
    }

      /**
     * Trahsed the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destory(Request $request)
    {
        try {
            try {
            $user = User::findOrFail($request->id);
            if ($user->forcedelete()) {
                return response()->json('User Deleted Successfully');
            }
        } catch (\Exception $e) {
            return response()->json($e->getmessage());
        }
        } catch (\Exception $e) {

        }
    }

}
