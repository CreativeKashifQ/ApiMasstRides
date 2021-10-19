<?php

namespace App\Http\Controllers\Api;

use App\File;
use App\User;
use App\Driver;
use Illuminate\Http\Request;
use App\Helpers\ApiResponser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DriverController extends Controller
{
    use ApiResponser;
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
    public function registerDriver(Request $request)
    {
        if($request->role == 'driver'){
            //validate the records if input field is empty
            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:drivers,email',
                'phone' => 'required|unique:users,phone',
                'cnic' => 'required',
                'country' => 'required',
                'state' => 'required',
                'city' => 'required',
                'role' => 'required',
            ]);
            }
            $user = new User;
            $user->phone =$request->phone;
            $user->email =$request->email;
            $user->setDriverRole();
            $user->password = Hash::make($request->password);
            $user->save();
             //save data in driver table
            $driver  = new Driver;
            $driver->user_id = $user->id;
            $driver->name = $request->name;
            $driver->email = $request->email;
            $driver->cnic = $request->cnic;
            $driver->phone = $request->phone;
            $driver->country = $request->country;
            $driver->state = $request->state;
            $driver->city = $request->city;
            $driver->save();
            // $driver->dispatchDriverNotification();

            //return json reponse with secret_hash_token it will be used when login..
            if($request->role == 'driver'){
                return $this->success([
                    'driver' => $driver,
                    'redirect_url'=> env('APP_URL').'/api/uploads/driver/images',
                ],'Driver Created Successfully, Make sure to send id of driver when uploads images not user_id',200);
            }else{
                return $this->error(['error'=>'occuring error when creating driver']);
            }

    }
    //********************************************************** */
        //UPLOAD DRIVER IMAGES
    //*********************************************************** */

    public function uploadDriverImages(Request $request)
    {


        $request->validate([
            'id' => 'required',
            'file' => 'required',
            'type' => 'required',
            'type_name' => 'required',
         ]);

         $file = new File;
         //front side of driver cnic image
         if($request->type_name == 'driver_cnic' && $request->type == 'front_side'){
            $filename="IMG".rand().".jpg";
            file_put_contents(public_path('images/uploads/drivers/').$filename,base64_decode($request->file));
            $file->user_id = $request->id;
            $file->type_name = 'driver_cnic';
            $file->type = 'front_side';
            $file->file = $filename;
            $file->save();
         }
         //back side of driver cnic image
         if($request->type_name == 'driver_cnic' && $request->type == 'back_side'){
            $filename="IMG".rand().".jpg";
            file_put_contents(public_path('images/uploads/drivers/').$filename,base64_decode($request->file));
            $file->user_id = $request->id;
            $file->type_name = 'driver_cnic';
            $file->type = 'back_side';
            $file->file = $filename;
            $file->save();
         }


        // //front side of driver lisence image
        if($request->type_name == 'driver_lisence' && $request->type == 'front_side'){
            $filename="IMG".rand().".jpg";
            file_put_contents(public_path('images/uploads/drivers/').$filename,base64_decode($request->file));
            $file->user_id = $request->id;
            $file->type_name = 'driver_lisence';
            $file->type = 'front_side';
            $file->file = $filename;
            $file->save();
         }
        //  //back side of driver lisence image
         if($request->type_name == 'driver_lisence' && $request->type == 'back_side'){
            $filename="IMG".rand().".jpg";
            file_put_contents(public_path('images/uploads/drivers/').$filename,base64_decode($request->file));
            $file->user_id = $request->id;
            $file->type_name = 'driver_lisence';
            $file->type = 'back_side';
            $file->file = $filename;
            $file->save();
         }

        //  //driver image
         if($request->type_name == 'driver_image' && $request->type == 'front_side'){
            $filename="IMG".rand().".jpg";
            file_put_contents(public_path('images/uploads/drivers/').$filename,base64_decode($request->file));
            $file->user_id = $request->id;
            $file->type_name = 'driver_image';
            $file->type = 'front_side';
            $file->file = $filename;
            $file->save();
         }


         //if all images uploaded then success message will be return
         return $this->success([],'Cnic,lisence,driver images uploaded successfully, Now you can show a new screen and display message which you want!', 200);



    }


    //***************************************************************** */
    //GET IMAGES ROUTES FOR DRIVER CNIC,LISENCE,PROFILE PIC
    //**************************************************************** */
    public function getDriverImages(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'type_name' => 'required',
            'type' => 'required',
        ]);

        $data = File::where('user_id',$request->id)->where('type',$request->type)->where('type_name',$request->type_name)->first();
        $image_url =  env('APP_URL').'/images/uploads/drivers/'.$data->file;
        if ($image_url) {
            return $this->success([
                'img_url' => $image_url,
            ], ''.$request->type_name. ' ' .$request->type, 200);
        } else {
            return $this->error([], 'picture not found with this user');
        }
    }



    /*
    |--------------------------------------------------------------------------
    | Helper Functions
    |--------------------------------------------------------------------------
    | Helper functions will be defined  here..
    */


}
