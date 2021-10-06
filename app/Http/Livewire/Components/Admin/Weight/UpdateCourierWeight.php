<?php

namespace App\Http\Livewire\Components\Admin\Weight;

use Livewire\Component;

class UpdateCourierWeight extends Component
{
    public $editId;

    public function mount($courierId)
    {
        $this->editId = $courierId;
    }

    public function edit()
    {
        $this->emit('CourierWeightEdit',$this->editId);
    }

    public function render()
    {
        return view('livewire.components.admin.weight.update-courier-weight');
    }
}
