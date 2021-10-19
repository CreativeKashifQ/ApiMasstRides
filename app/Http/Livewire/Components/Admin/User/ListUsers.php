<?php

namespace App\Http\Livewire\Components\Admin\User;

use App\Role;
use App\User;
use App\Franchise;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class ListUsers extends Component
{
    /*
    |--------------------------------------------------------------------------
    | Public Data
    |--------------------------------------------------------------------------
    | This data will be visible to client. Don't instantiate any instance of a class
    | containing sensitive information
    */
    public $search,$role,$franchises;
    public $user,$addUser,$password,$confirm_password;
    public $permissions,$selectedPermissions=[];
    public $editable = false;



    /*
    |--------------------------------------------------------------------------
    | Override Properties
    |--------------------------------------------------------------------------
    | Component properties like rules, messages
    */
    protected $rules = [
        'user.name' => 'required',
        'user.email' => 'required|email|unique:users,email',
        'role' => 'required',
        'user.franchise_id'=>'required',
        'password' => 'required|same:confirm_password',
    ];

    /*
    |--------------------------------------------------------------------------
    | Listeners
    |--------------------------------------------------------------------------
    | Livewire event listeners like created, updated or deleted
    */
    protected $listeners = ['removeRecord'];
    public function removeRecord($id)
    {
        User::where('id',$id)->delete();
        $this->dispatchBrowserEvent('swal:modal',[
            'type' => 'success',
            'message' => 'User Deleted Successfully',
            'text' => 'Masst Rides' ,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | Lifecycle Hooks
    |--------------------------------------------------------------------------
    | Component hooks like hydrate, updated, render
    */

    public function mount()
    {

        $this->user = new User;
        $this->franchises = Franchise::all();
        $this->allowPermissions();

    }
    public function render()
    {
        $searchWord = '%'.$this->search .'%';
        $users = User::where('role','like',$searchWord)
        ->where('role','!=','MASST@098RIDES')
        ->orderBy('created_at','asc')->paginate(10);
        return view('livewire.components.admin.user.list-users',compact('users'))->layout('layouts.app1');
    }

    /*
    |--------------------------------------------------------------------------
    | Methods
    |--------------------------------------------------------------------------
    | User defined methods like, register, verify or load
    */
    public function store()
    {
        $this->validate();
        $this->user->password = Hash::make($this->password);
        $this->user->permissions = json_encode($this->selectedPermissions);
        if($this->role == 'Franchise'){
            $this->user->setFranchiserRole();
        }
        $this->user->save();
        $this->dispatchBrowserEvent('swal:modal',[
            'type' => 'success',
            'message' => 'User Created Successfully',
            'text' => 'With Email'.' '.$this->user->email.' '. '& Password' .'  '. $this->password ,
        ]);
        $this->resetForm();
        $this->emit('UserCreated');
    }
    public function edit($id)
    {
       $this->user = User::where('id',$id)->first();
       $this->role = $this->user->role;
       $this->selectedPermissions = json_decode($this->user->permissions);
    }
    public function update()
    {
        $this->validate([
            'user.name' => 'required',
            'user.email' => 'required',
            'role' => 'required',
            'user.franchise_id' => 'required'

        ]);
        $this->user->password = $this->password ? Hash::make($this->password) : $this->user->password;
        $this->user->permissions = json_encode($this->selectedPermissions);
        if($this->role == 'Franchise'){
            $this->user->setFranchiserRole();
        }
        $this->user->update();
        $this->dispatchBrowserEvent('swal:modal',[
            'type' => 'success',
            'message' => 'User Updated Successfully',
            'text' => 'With Email'.' '.$this->user->email.' '. '& Password' .'  '. $this->password ,
        ]);
        $this->emit('UserUdpated');
    }
    public function delete($id)
    {
        $this->dispatchBrowserEvent('swal:confirm',[
            'type' => 'warning',
            'message' => 'Are you sure ?',
            'text' => 'If deleted, you will not be able to recover this imaginary file!' ,
            'id' => $id,
        ]);

    }


    /*
    |--------------------------------------------------------------------------
    | Helper Functions
    |--------------------------------------------------------------------------
    | Class helper functions
    */
    private function allowPermissions()
    {
        $this->permissions = [
            ['id'=> 1, 'per_id' => 'MasstCustomers', 'name'=>'Customers'],
            ['id'=> 2, 'per_id' => 'MasstDrivers', 'name'=>'Drivers'],
            ['id'=> 3, 'per_id' => 'MasstEmployees', 'name'=>'Employees'],
            ['id'=> 4, 'per_id' => 'MasstVehicles', 'name'=>'Vehicles'],
            ['id'=> 5, 'per_id' => 'MasstRentACar','name'=>'Rent a Car'],
            ['id'=> 6, 'per_id' => 'MasstGoodsAndTransport','name'=>'Goods & Transport'],
            ['id'=> 7, 'per_id' => 'MasstCourier','name'=>'Courier'],
            ['id'=> 8, 'per_id' => 'MasstToursAndTravel','name'=>'Tours & Travel'],
            ['id'=> 9, 'per_id' => 'MasstVehicleManagement','name'=>'Vehicle Management'],
        ];

    }

    public function resetForm()
    {
        $this->user->name = '';
        $this->user->email = '';
        $this->user->role_id = '';
        $this->password = '';
        $this->confirm_password = '';
        $this->selectedPermissions = [];
    }



}
