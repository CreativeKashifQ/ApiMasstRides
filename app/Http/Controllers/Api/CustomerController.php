<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Helpers\ApiResponser;
use Image;
use File;


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

    public function updateProfilePicture(Request $request)
    {
        return response()->json($request->hasFile('file'));
        $request->validate([
            'id' => 'required',
            'file' => 'required'
        ]);

        $user = User::where('id', $request->id)->first();
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            Image::make($file)->resize(200, 200)->save(public_path('images/uploads/profilepics/'.$filename));
            $user->file = $filename;
            $path = env('APP_URL').'/images/uploads/profilepics/'.$filename;
            $user->save();
            return $this->success([
                'user' => $user,
                'img_url' => $path,
            ], 'Picture Updated Successfully', 200);
        } else {
            return $this->error([], 'error when uploding image, file is not attached');
        }
    }

    public function getProfilePicture(Request $request)
    {

        $request->validate([
            'id' => 'required',
        ]);

        $user = User::where('id', $request->id)->first();
        $image_url =  env('APP_URL').'/images/uploads/profilepics/'.$user->file;
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

        // return response()->json('test data for imaage');
    //     $filename="IMG".rand().".jpg";
    //    $r =  file_put_contents("images/".$filename,base64_decode($request->upload));
    //     // $file = base64_decode($r);
    //     return response()->json($request->hasFile('upload'));
        $request->validate([
            't1' => 'required',
            't2' => 'required',
            'upload' => 'required',
        ]);

        $filename="IMG".rand().".jpg";
        file_put_contents(public_path('images/uploads/profilepics/').$filename,base64_decode($request->upload));
        return response()->json('image upload successfully');
        $user = User::where('id', $request->id)->first();
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            Image::make($file)->resize(200, 200)->save(public_path('images/uploads/profilepics/'.$filename));
            $user->file = $filename;
            $path = env('APP_URL').'/images/uploads/profilepics/'.$filename;
            $user->save();
            return $this->success([
                'user' => $user,
                'img_url' => $path,
            ], 'Picture Updated Successfully', 200);
        } else {
            return $this->error([], 'error when uploding image, file is not attached');
        }
    }



    /*
    |--------------------------------------------------------------------------
    | Helpers Functions
    |--------------------------------------------------------------------------
    | Helpers Functions
    */


    public function testFileUpload()
    {

        $conn=mysqli_connect("localhost","masstrid_test","MJrGpAkXCL)T");
        mysqli_select_db($conn,"masstrid_test");


	   $name=$_POST['t1'];
	   $design=$_POST['t2'];
	   $img=$_POST['upload'];

                   $filename="IMG".rand().".jpg";
	   file_put_contents("images/".$filename,base64_decode($img));

			$qry="INSERT INTO `tbl_staff` (`id`, `name`, `desig`, `image`)
			      VALUES (NULL, '$name', '$design', '$filename')";

			$res=mysqli_query($conn,$qry);

			if($res==true)
			 echo "File Uploaded Successfully";
			else
			 echo "Could not upload File";
    }

}
