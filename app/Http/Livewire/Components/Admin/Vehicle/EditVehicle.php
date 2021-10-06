<?php

namespace App\Http\Livewire\Components\Admin\Vehicle;

use App\VOwner;
use App\Vehicle;
use App\Franchise;
use App\VehicleMake;
use App\VehicleName;
use App\VehicleType;
use App\VehicleColor;
use App\VehicleModel;
use App\VehicleEngine;
use Livewire\Component;
use App\VehicleFuletype;
use App\VehicleRegisterfor;
use App\VehicleTransmission;

class EditVehicle extends Component
{
    /*
    |--------------------------------------------------------------------------
    | Public Data
    |--------------------------------------------------------------------------
    | This data will be visible to client. Don't instantiate any instance of a class
    | containing sensitive information
    */
    public $vehicle,$image,$vehicleMakes,$vehicleTypes,$vehilceColors,$vehicleEngines,$vehicleFuletypes,$vehicleRegisterfors;
    public $franchises,$toggle = false, $VehicleEngineId,$VehicleTypeId,$vehicleTransmissions;
    public $o_name,$o_email,$o_phone,$o_cnic,$o_address,$o_status,$o_company_name,$o_company_number,$o_company_file;
    public $SelectedMake = null, $VehicleNames = null;
    public $SelectedName = null, $VehicleModels = null;
    public $SelectedModel = null, $VehicleEngine = null, $VehicleType = null;

    /*
    |--------------------------------------------------------------------------
    | Override Properties
    |--------------------------------------------------------------------------
    | Component properties like rules, messages
    */
    protected $rules = [
        //vehicle information
        'vehicle.reg_no' => 'required',
        'SelectedMake' => 'required',
        'SelectedName'=> 'required',
        'SelectedModel' => 'required',
        'VehicleEngineId'=> 'required',
        'VehicleTypeId' => 'required',
        'vehicle.year' => 'required',
        'vehicle.colorid' => 'required',
        'vehicle.transmissionid' => 'required',
        'vehicle.fuletypeid' => 'required',
        'vehicle.registrationdate' => 'required',
        'vehicle.tracker' => 'required',
        'vehicle.registerforid' => 'required',
        'vehicle.franchiseid' => 'required',
        'vehicle.class' => 'required',
        'vehicle.country' => 'required',
        //owner information
        'o_name' => 'required',
        'o_email' => 'required',
        'o_phone' => 'required',
        'o_cnic' => 'required',
        'o_address' => 'required',
        'o_status' => 'required',
        'o_company_name' => 'required',
        'o_company_number' => 'required',
    ];

    /*
    |--------------------------------------------------------------------------
    | Listeners
    |--------------------------------------------------------------------------
    | Livewire event listeners like created, updated or deleted
    */


    /*
    |--------------------------------------------------------------------------
    | Lifecycle Hooks
    |--------------------------------------------------------------------------
    | Component hooks like hydrate, updated, render
    */
    public function updatedSelectedMake($MakeId)
    {
        $make = VehicleMake::where('id',$MakeId)->first();
        $this->VehicleNames = $make->vehicleNames;
    }

    public function updatedSelectedName($NameId)
    {
        $name = VehicleName::where('id',$NameId)->first();
        $this->VehicleModels = $name->vehicleModels;

    }

    public function updatedSelectedModel($ModelId)
    {

        $model = VehicleModel::where('id',$ModelId)->first();
        $this->VehicleEngine = $model->engine->name;
        $this->VehicleEngineId = $model->engine->id;
        $this->VehicleType = $model->type->name;
        $this->VehicleTypeId = $model->type->id;
    }



    public function updatedOStatus($property)
    {
        if($property == 'company'){
            $this->toggle = true;
        }else{
            $this->toggle = false;
        }
    }
    public function mount($id)
    {
        $this->vehicle = Vehicle::where('id',$id)->first();
        $this->SelectedMake = $this->vehicle->makeid;
        $this->SelectedName = $this->vehicle->nameid;
        $this->SelectedModel = $this->vehicle->modelid;
        $this->VehicleEngine = $this->vehicle->engine->name;
        $this->VehicleEngineId = $this->vehicle->engine->id;
        $this->VehicleType = $this->vehicle->type->name;
        $this->VehicleTypeId = $this->vehicle->type->id;


        $owner = $this->vehicle->vowner;
        $this->o_name = $owner->o_name;
        $this->o_email = $owner->o_email;
        $this->o_phone = $owner->o_phone;

        $this->o_cnic = $owner->o_cnic;
        $this->o_address = $owner->o_address;
        $this->o_status = $owner->o_status;
        $this->o_company_name = $owner->o_company_name;
        $this->o_company_number = $owner->o_company_number;



        $this->VehicleNames = VehicleName::all();
        $this->VehicleModels = VehicleModel::all();
        $this->vehicle->country = 'Pakistan';
        $this->vehicleMakes = VehicleMake::all();
        $this->vehilceColors = VehicleColor::all();
        $this->vehicleEngines = VehicleEngine::all();
        $this->vehicleFuletypes = VehicleFuletype::all();
        $this->vehicleRegisterfors = VehicleRegisterfor::all();
        $this->vehicleTransmissions = VehicleTransmission::all();
        $this->franchises = Franchise::all();
    }
    public function render()
    {
        return view('livewire.components.admin.vehicle.edit-vehicle')->layout('layouts.app1');
    }

    /*
    |--------------------------------------------------------------------------
    | Methods
    |--------------------------------------------------------------------------
    | User defined methods like, register, verify or load
    */
    public function update()
    {

        if($this->o_status == 'company'){
            $this->rules = array_replace($this->rules,['o_company_name' => 'required']);
            $this->rules = array_replace($this->rules,['o_company_number' => 'required']);
            $this->rules = array_replace($this->rules,['o_company_file' => 'required']);
        }else{
            $this->rules = array_replace($this->rules,['o_company_name' => '']);
            $this->rules = array_replace($this->rules,['o_company_number' => '']);
            $this->rules = array_replace($this->rules,['o_company_file' => '']);
        }
        $this->validate();
        //vehicle information save
        $this->vehicle->makeid = $this->SelectedMake;
        $this->vehicle->nameid = $this->SelectedName;
        $this->vehicle->modelid = $this->SelectedModel;
        $this->vehicle->engineid = $this->VehicleEngineId;
        $this->vehicle->typeid = $this->VehicleTypeId;
        if($this->image){
            $filename= time().'.'.$this->image->getClientOriginalExtension();
            Image::make($this->image)->resize( 350, 200 )->save(public_path('images/uploads/vehicles/'. $filename ));
            $this->vehicle->image = $filename;
            }else{
                $this->vehicle->image = $this->vehicle->image;
            }
        $this->vehicle->update();
        //vehicle owner information save
        $owner = VOwner::where('vehicle_id',$this->vehicle->id)->first();
        $owner->vehicle_id = $this->vehicle->id;
        $owner->o_name = $this->o_name;
        $owner->o_email = $this->o_email;
        $owner->o_phone = $this->o_phone;
        $owner->o_cnic = $this->o_cnic;
        $owner->o_address = $this->o_address;
        $owner->o_status = $this->o_status;
        $owner->o_company_name = $this->o_company_name;
        $owner->o_company_number = $this->o_company_number;
        if($this->o_company_file){
        $filename= time().'.'.$this->o_company_file->getClientOriginalExtension();
        Image::make($this->o_company_file)->resize( 350, 200 )->save(public_path('images/uploads/documents/'. $filename ));
        $owner->o_company_file = $filename;
        }else{
            $owner->o_company_file = $owner->o_company_file;
        }
        $owner->update();
        $this->dispatchBrowserEvent('swal:modal',[
            'type' => 'success',
            'message' => 'Vehicle Updated Successfully',
            'text' => 'Now your vehicle is updated in list...' ,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Helper Functions
    |--------------------------------------------------------------------------
    | Class helper functions
    */

}
