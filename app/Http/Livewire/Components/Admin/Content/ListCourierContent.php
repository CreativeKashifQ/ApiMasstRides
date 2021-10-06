<?php

namespace App\Http\Livewire\Components\Admin\Content;

use App\Couriercontent;
use Livewire\Component;

class ListCourierContent extends Component
{
    public $search;

    protected $listeners = ['CourierContentCreated',"CourierContentUpdated",'CourierContentDeleted'];

    public function CourierContentCreated()
    {
        //leave emtpy
    }

    public function CourierContentDeleted($message)
    {
        session()->flash('success',$message);
    }

    public function CourierContentUpdated()
    {
        //leave empty
    }

    public function render()
    {
        $searchWord = '%'.$this->search.'%';
        $couriercontents = Couriercontent::where('name','like',$searchWord)
        ->orderBy('created_at','asc')->paginate(10);
        return view('livewire.components.admin.content.list-courier-content',compact('couriercontents'))->layout('layouts.app1');
    }
}
