<?php

namespace App\Http\Livewire\Components\Admin\Weight;

use App\Courierweight;
use App\Franchise;
use Livewire\Component;

class ListCourierWeight extends Component
{
    public $search;

    protected $listeners = ['CourierWeightCreated',"CourierWeightUpdated",'CourierWeightDeleted'];

    public function CourierWeightCreated()
    {
        //leave emtpy
    }

    public function CourierWeightDeleted($message)
    {
        session()->flash('success',$message);
    }

    public function CourierWeightUpdated()
    {
        //leave empty
    }

    public function render()
    {
        $searchWord = '%'.$this->search.'%';
        $couriers = Courierweight::where('weight','like',$searchWord)
        ->orWhere('price','like',$searchWord)
        ->orderBy('created_at','asc')->paginate(10);
        $franchises = Franchise::all();
        return view('livewire.components.admin.weight.list-courier-weight',compact('couriers','franchises'))->layout('layouts.app1');
    }
}
