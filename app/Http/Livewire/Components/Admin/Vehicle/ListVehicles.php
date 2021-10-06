<?php

namespace App\Http\Livewire\Components\Admin\Vehicle;

use App\Vehicle;
use App\VehicleMake;
use Livewire\Component;
use File;

class ListVehicles extends Component
{
    /*
    |--------------------------------------------------------------------------
    | Public Data
    |--------------------------------------------------------------------------
    | This data will be visible to client. Don't instantiate any instance of a class
    | containing sensitive information
    */
    public $search;

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


    /*
    |--------------------------------------------------------------------------
    | Lifecycle Hooks
    |--------------------------------------------------------------------------
    | Component hooks like hydrate, updated, render
    */
    public function render()
    {


        $searchWord = '%'.$this->search .'%';
        $vehicles = Vehicle::where('id','like',$searchWord)->where('user_id',auth()->user()->id)
        ->orderBy('created_at','asc')->paginate();
        return view('livewire.components.admin.vehicle.list-vehicles',compact('vehicles'))->layout('layouts.app1');
    }

    /*
    |--------------------------------------------------------------------------
    | Methods
    |--------------------------------------------------------------------------
    | User defined methods like, register, verify or load
    */
    public function delete($id)
    {

        $vehicle = Vehicle::where('id',$id)->first();
        $owner = $vehicle->vowner;
        $owner->delete();
        $vehicle->delete();
    }

    /*
    |--------------------------------------------------------------------------
    | Helper Functions
    |--------------------------------------------------------------------------
    | Class helper functions
    */

}
