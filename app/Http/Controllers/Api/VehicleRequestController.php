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
            'email' => '',
            'phone' => 'required|unique:vehicle_requests,phone',
            'cnic' => 'required',
            'city' => 'required',
            'd_lisence' => 'required',
            'v_name' => 'required',
            'v_model' => 'required',
            'v_documents' => 'required',
            'v_pics' => 'required',
        ]);
        //save vehicle request  personal information
        $v_request = new VehicleRequest();
        $v_request->name  = $request->name;
        $v_request->email  = $request->email;
        $v_request->phone  = $request->phone;
        $v_request->cnic  = $request->cnic;
        $v_request->v_name  = $request->v_name;
        $v_request->v_model  = $request->v_model;
        $v_request->save();

        //save documents of vehicles
        $v_document = new VehicleDocument();
        if($request->hasFile(['d_lisence','v_documents','v_pics'])){
            //for driving lisence
            if($request->file('d_lisence')){
            $file = $request->file('d_lisence');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            Image::make($file)->resize(200, 200)->save(public_path('images/uploads/documents/'.$filename));
            $v_document->type = 'd_lisence';
            $v_document->vehicle_request_id = $v_request->id;
            $v_document->file = $filename;
            $v_document->save();
            }
            //for vehicle documents
            if($request->file('v_documents')){
            $files = $request->file('v_documents');
            foreach($files as $key => $file ){
            $filename = time() . '.' . $file->getClientOriginalExtension();
            Image::make($file)->resize(200, 200)->save(public_path('images/uploads/documents/'.$filename));
            $v_document->type = 'v_document';
            $v_document->vehicle_request_id = $v_request->id;
            $v_document->file = $filename;
            $v_document->save();
            }
            //for vehicle v_pics
            if($request->file('v_pics')){
                $files = $request->file('v_pics');
                foreach($files as $key => $file ){
                $filename = time() . '.' . $file->getClientOriginalExtension();
                Image::make($file)->resize(200, 200)->save(public_path('images/uploads/documents/'.$filename));
                $v_document->type = 'v_pic';
                $v_document->vehicle_request_id = $v_request->id;
                $v_document->file = $filename;
                $v_document->save();
            }


            }

        }else{
            return $this->error([
                'data' => null,
            ],'Documents not attach',301);
        }







    }


    /*
    |--------------------------------------------------------------------------
    | Helper Functions
    |--------------------------------------------------------------------------
    | Helper functions will be defined  here..
    */
    }

}
