<?php

namespace App\Http\Livewire\Components\Admin\User;

use App\Role;
use App\User;
use Livewire\Component;

class DeleteUser extends Component
{
    /*
    |--------------------------------------------------------------------------
    | Public Data
    |--------------------------------------------------------------------------
    | This data will be visible to client. Don't instantiate any instance of a class
    | containing sensitive information
    */
    public $userId;


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
        return view('livewire.components.admin.user.delete-user');
    }

    /*
    |--------------------------------------------------------------------------
    | Methods
    |--------------------------------------------------------------------------
    | User defined methods like, register, verify or load
    */

    public function delete()
    {
        $query = new User;
        $userCount = $query->count();
        if($userCount == 1){
            $message = 'error';
            $this->emit('UserDeleted',$message);
        }else{
            $query->where('id',$this->userId)->delete();
            $message ='success';
            $this->emit('UserDeleted',$message);
        }

    }

    /*
    |--------------------------------------------------------------------------
    | Helper Functions
    |--------------------------------------------------------------------------
    | Class helper functions
    */

}
