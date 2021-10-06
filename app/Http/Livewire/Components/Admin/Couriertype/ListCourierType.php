<?php

namespace App\Http\Livewire\Components\Admin\Couriertype;

use App\Couriertype;
use Livewire\Component;

class ListCourierType extends Component
{
    public $search;

    protected $listeners = ['CourierTypeCreated',"CourierTypeUpdated",'CourierTypeDeleted'];

    public function CourierTypeCreated()
    {
        //leave emtpy
    }

    public function CourierTypeDeleted($message)
    {
        session()->flash('success',$message);
    }

    public function CourierTypeUpdated()
    {
        //leave empty
    }

    public function render()
    {
        $searchWord = '%'.$this->search.'%';
        $couriertypes = Couriertype::where('name','like',$searchWord)
        ->orderBy('created_at','asc')->paginate(10);
        return view('livewire.components.admin.couriertype.list-courier-type',compact('couriertypes'))->layout('layouts.app1');
    }
}
