<?php

namespace App\Http\Livewire\Components\Admin\Courier;

use App\Courier;
use App\Couriercontent;
use App\Couriertype;
use App\Franchise;
use Livewire\Component;

class ListCourier extends Component
{
    public $search;
    public $couriertypes,$couriercontents,$franchises;

    protected $listeners = ['CourierCreated',"CourierUpdated",'CourierDeleted','CourierCompleted','CourierPended'];

    public function CourierCreated()
    {
        //leave emtpy
    }

    public function CourierDeleted($message)
    {
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => $message,
            'text' => 'click ok to close'
        ]);

    }

    public function CourierUpdated()
    {
        //leave empty
    }
    public function CourierCompleted($message)
    {
        // session()->flash('success',$message);
    }
    public function CourierPended($message)
    {
        // session()->flash('success',$message);
    }

    public function mount()
    {
        $this->couriertypes = Couriertype::all();
        $this->couriercontents = Couriercontent::all();
        $this->franchises = Franchise::all();

    }

    public function render()
    {
        $searchWord = '%'.$this->search .'%';
        $couriers = Courier::where('recipient_name','like',$searchWord)
        ->orderBy('created_at','asc')->paginate(10);
        return view('livewire.components.admin.courier.list-courier',compact('couriers'))->layout('layouts.app1');
    }
}
