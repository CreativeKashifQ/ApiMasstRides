<?php

namespace App\Http\Livewire\Components\Admin\Content;

use App\Couriercontent;
use Livewire\Component;

class CreateCourierContent extends Component
{
    public $couriercontent;

    public function mount()
    {
        $this->couriercontent = new Couriercontent();

    }

    protected $rules = [
        'couriercontent.name' => 'required|unique:couriercontents,name',
        'couriercontent.price' => 'required',
    ];



    public function resetForm()
    {
        $this->couriercontent->name = '';
        $this->couriercontent->price = '';
    }

    public function store()
    {
        $this->validate();
        $this->couriercontent->save();
        session()->flash('success','Courier Content With Price Saved Successfully');
        $this->resetForm();
        $this->emit('CourierContentCreated');
        $this->couriercontent = new Couriercontent();
    }

    protected $listeners = ['CourierContentEdit'];

    public function CourierContentEdit($editId)
    {

        $this->couriercontent = Couriercontent::findOrFail($editId);
    }

    public function update()
    {
            $this->validate([
                'couriercontent.name' => 'required',
                'couriercontent.price' => 'required',
            ]);
            $this->couriercontent->update();
            session()->flash('success','Courier Content With Price Updated Successfully');
            $this->emit('CourierContentUpdated');
            $this->resetForm();

    }
    public function render()
    {
        return view('livewire.components.admin.content.create-courier-content');
    }
}
