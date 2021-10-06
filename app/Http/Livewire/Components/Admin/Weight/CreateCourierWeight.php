<?php

namespace App\Http\Livewire\Components\Admin\Weight;

use App\Courierweight;
use App\Franchise;
use Livewire\Component;

class CreateCourierWeight extends Component
{
    public $courier;

    public function mount()
    {
        $this->courier = new Courierweight();

    }

    protected $rules = [
        'courier.weight' => 'required',
        'courier.price' => 'required',
        'courier.ofranchise_id' => 'required',
        'courier.dfranchise_id' => 'required',
    ];



    public function resetForm()
    {
        $this->courier->weight = '';
        $this->courier->price = '';
        $this->courier->ofranchise_id= '';
        $this->courier->dfranchise_id = '';
    }

    public function store()
    {
        $this->validate();
        $this->courier->save();
        session()->flash('success','Courier Weight with Price & Locations Saved Successfully');
        $this->resetForm();
        $this->emit('CourierWeightCreated');
        $this->courier = new Courierweight();
    }

    protected $listeners = ['CourierWeightEdit'];

    public function CourierWeightEdit($editId)
    {

        $this->courier = Courierweight::findOrFail($editId);
    }

    public function update()
    {

            $this->courier->update();
            session()->flash('success','Courier Weight With Price & Locations Updated Successfully');
            $this->emit('CourierWeightUpdated');
            $this->resetForm();

    }

    public function render()
    {
        $franchises = Franchise::all();
        return view('livewire.components.admin.weight.create-courier-weight',compact('franchises'));
    }
}
