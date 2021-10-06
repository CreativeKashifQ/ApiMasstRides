<?php

namespace App\Http\Livewire\Components\Admin\Couriertype;

use App\Couriertype;
use Livewire\Component;

class CreateCourierType extends Component
{

    public $couriertype;

    public function mount()
    {
        $this->couriertype = new Couriertype();

    }

    protected $rules = [
        'couriertype.name' => 'required|unique:couriertypes,name',
        'couriertype.price' => 'required',
    ];



    public function resetForm()
    {
        $this->couriertype->name = '';
        $this->couriertype->price = '';
    }

    public function store()
    {
        $this->validate();
        $this->couriertype->save();
        session()->flash('success','Courier Type Save Successfully');
        $this->resetForm();
        $this->emit('CourierTypeCreated');
        $this->couriertype = new Couriertype();
    }

    protected $listeners = ['CourierTypeEdit'];

    public function CourierTypeEdit($editId)
    {

        $this->couriertype = Couriertype::findOrFail($editId);
    }

    public function update()
    {
            $this->validate([
                'couriertype.name' => 'required',
                'couriertype.price' => 'required',
            ]);
            $this->couriertype->update();
            session()->flash('success','Courier Updated Successfully');
            $this->emit('CourierTypeUpdated');
            $this->resetForm();
            $this->editable = false;

    }


    public function render()
    {
        return view('livewire.components.admin.couriertype.create-courier-type');
    }
}
