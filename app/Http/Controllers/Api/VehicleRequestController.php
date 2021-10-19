<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponser;
use App\VehicleRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\VehicleDocument;
use Image;

class VehicleRequestController extends Controller
{
    use ApiResponser;

    /*
    |--------------------------------------------------------------------------
    | GET REQUESTS
    |--------------------------------------------------------------------------
    | get will be defined here.
    */

    /*
    |--------------------------------------------------------------------------
    | POST REQUESTS
    |--------------------------------------------------------------------------
    | posts requests will be define here
    */
    public function vehicleRequest(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|unique:vehicle_requests,phone',
            'cnic' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
        ]);

        //save vehicle request  personal information
        $v_request = new VehicleRequest();
        $v_request->name  = $request->name;
        $v_request->email  = $request->email;
        $v_request->phone  = $request->phone;
        $v_request->cnic  = $request->cnic;
        $v_request->city  = $request->city;
        $v_request->state  = $request->state;
        $v_request->country  = $request->country;
        $v_request->save();

        return $this->success([],'Vehicle Owner Record Saved Successfully',200);

    }
    //UPLOADING VEHICLE REQUESTS DOCUMENTS AND IMAGES
    public function uploadVehicleRequestImages(Request $request)
    {

        $request->validate([
            'id' => 'required',
            'file' => 'required',
            'type' => 'required',
            'type_name' => 'required'
        ]);

          //INITIATING VEHICLEDOCUMENT CLASS TO SAVE IMAGES
          $v_document = new VehicleDocument();
            //VEHICLE IMAGES
          if($request->type_name == 'vehicle' && $request->type == 'vehicle_image'){
            $filename="IMG".rand().".jpg";
            file_put_contents(public_path('images/uploads/documents/').$filename,base64_decode($request->file));
            $v_document->vehicle_request_id = $request->id;
            $v_document->type_name = $request->type_name;
            $v_document->type = $request->type;
            $v_document->file = $filename;
            $v_document->save();
         }
         //VEHICLE DOCUMENTS
         if($request->type_name == 'vehicle' && $request->type == 'vehicle_document'){
            $filename="IMG".rand().".jpg";
            file_put_contents(public_path('images/uploads/documents/').$filename,base64_decode($request->file));
            $v_document->vehicle_request_id = $request->id;
            $v_document->type_name = $request->type_name;
            $v_document->type = $request->type;
            $v_document->file = $filename;
            $v_document->save();
         }
         //CNIC FRONT SIDE
         if($request->type_name == 'driver_cnic' && $request->type == 'front_side'){
            $filename="IMG".rand().".jpg";
            file_put_contents(public_path('images/uploads/documents/').$filename,base64_decode($request->file));
            $v_document->vehicle_request_id = $request->id;
            $v_document->type_name = $request->type_name;
            $v_document->type = $request->type;
            $v_document->file = $filename;
            $v_document->save();
         }
         //CNIC BACK SIDE
         if($request->type_name == 'driver_cnic' && $request->type == 'back_side'){
            $filename="IMG".rand().".jpg";
            file_put_contents(public_path('images/uploads/documents/').$filename,base64_decode($request->file));
            $v_document->vehicle_request_id = $request->id;
            $v_document->type_name = $request->type_name;
            $v_document->type = $request->type;
            $v_document->file = $filename;
            $v_document->save();
         }
         //LISENCE FRONT SIDE
         if($request->type_name == 'driver_lisence' && $request->type == 'front_side'){
            $filename="IMG".rand().".jpg";
            file_put_contents(public_path('images/uploads/documents/').$filename,base64_decode($request->file));
            $v_document->vehicle_request_id = $request->id;
            $v_document->type_name = $request->type_name;
            $v_document->type = $request->type;
            $v_document->file = $filename;
            $v_document->save();
         }
         //LISENCE BACK SIDE
         if($request->type_name == 'driver_lisence' && $request->type == 'back_side'){
            $filename="IMG".rand().".jpg";
            file_put_contents(public_path('images/uploads/documents/').$filename,base64_decode($request->file));
            $v_document->vehicle_request_id = $request->id;
            $v_document->type_name = $request->type_name;
            $v_document->type = $request->type;
            $v_document->file = $filename;
            $v_document->save();
         }

         return $this->success([],'Vehicle Images,documents,driver lisence,driver cnic Successfully Uploaded',200);


    }


    /*
    |--------------------------------------------------------------------------
    | Helper Functions
    |--------------------------------------------------------------------------
    | Helper functions will be defined  here..
    */


}
