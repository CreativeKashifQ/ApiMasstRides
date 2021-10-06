<?php

namespace App\Http\Livewire\Components\Admin\Vehicle;

use App\VehicleRequest;
use Livewire\Component;

class RequestList extends Component
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
        $requests = VehicleRequest::where('name','like',$searchWord)
        ->orderBy('created_at','asc')->paginate(10);
        return view('livewire.components.admin.vehicle.request-list',compact('requests'))->layout('layouts.app1');
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
