<?php

namespace App\Http\Livewire\Components\Admin\Vehicle;

use App\Vehicle;
use App\VOwner;
use Livewire\Component;

class OwnerDetail extends Component
{
    /*
    |--------------------------------------------------------------------------
    | Public Data
    |--------------------------------------------------------------------------
    | This data will be visible to client. Don't instantiate any instance of a class
    | containing sensitive information
    */
    public $vowner;

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
    public function mount($id)
    {
        $vehicle = Vehicle::where('id',$id)->first();
        $this->vowner = $vehicle->vowner;
        $this->name = $this->vowner->o_name;
    }
    public function render()
    {
        return view('livewire.components.admin.vehicle.owner-detail')->layout('layouts.app1');
    }

    /*
    |--------------------------------------------------------------------------
    | Methods
    |--------------------------------------------------------------------------
    | User defined methods like, register, verify or load
    */


    /*
    |--------------------------------------------------------------------------
    | Helper Functions
    |--------------------------------------------------------------------------
    | Class helper functions
    */

}
