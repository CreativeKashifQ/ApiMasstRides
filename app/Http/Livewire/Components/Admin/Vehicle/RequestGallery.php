<?php

namespace App\Http\Livewire\Components\Admin\Vehicle;

use App\Franchise;
use App\VehicleRequest;
use Livewire\Component;
use App\VehicleDocument;

class RequestGallery extends Component
{
    /*
    |--------------------------------------------------------------------------
    | Public Data
    |--------------------------------------------------------------------------
    | This data will be visible to client. Don't instantiate any instance of a class
    | containing sensitive information
    */
    public $franchises,$vRequest,$vImages,$vDocuments,$cnic_front,$cnic_back,$lisence_front,$lisence_back;
    public $franchise;

    /*
    |--------------------------------------------------------------------------
    | Override Properties
    |--------------------------------------------------------------------------
    | Component properties like rules, messages
    */


    /*
    |--------------------------------------------------------------------------
    | Listeners
    |--------------------------------------------------------------------------
    | Livewire event listeners like created, updated or deleted
    */
   protected $rules = [
       'franchise' => 'required',
   ];

    /*
    |--------------------------------------------------------------------------
    | Lifecycle Hooks
    |--------------------------------------------------------------------------
    | Component hooks like hydrate, updated, render
    */
    public function mount(VehicleRequest $vrequest)
    {

        $this->franchises = Franchise::where('city',$vrequest->city)->get();
        $this->vRequest = $vrequest;
        $this->vImages = VehicleDocument::where('vehicle_request_id',$vrequest->id)->where('type_name','vehicle')->where('type','vehicle_image')->get();
        $this->vDocuments = VehicleDocument::where('vehicle_request_id',$vrequest->id)->where('type_name','vehicle')->where('type','vehicle_document')->get();
        //CNIC
        $this->cnic_front = VehicleDocument::where('vehicle_request_id',$vrequest->id)->where('type_name','cnic')->where('type','front_side')->first();
        $this->cnic_back = VehicleDocument::where('vehicle_request_id',$vrequest->id)->where('type_name','cnic')->where('type','back_side')->first();
        //LISENCE
        $this->lisence_front = VehicleDocument::where('vehicle_request_id',$vrequest->id)->where('type_name','lisence')->where('type','front_side')->first();
        $this->lisence_back = VehicleDocument::where('vehicle_request_id',$vrequest->id)->where('type_name','lisence')->where('type','back_side')->first();

    }
    public function render()
    {
        return view('livewire.components.admin.vehicle.request-gallery')->layout('layouts.app1');
    }

    /*
    |--------------------------------------------------------------------------
    | Methods
    |--------------------------------------------------------------------------
    | User defined methods like, register, verify or load
    */
    public function assignFranchise()
    {
        $this->validate();
        $this->vRequest->franchise_id = $this->franchise;
        $this->vRequest->save();
        return back()->with('success','Selected Franchise Assigned For This Vehicle Request');

    }

    /*
    |--------------------------------------------------------------------------
    | Helper Functions
    |--------------------------------------------------------------------------
    | Class helper functions
    */

}
