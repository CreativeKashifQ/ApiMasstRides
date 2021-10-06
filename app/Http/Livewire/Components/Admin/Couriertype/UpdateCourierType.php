<?php

namespace App\Http\Livewire\Components\Admin\Couriertype;

use Livewire\Component;

class UpdateCourierType extends Component
{
    public $editId;

    public function mount($couriertypeId)
    {
        $this->editId = $couriertypeId;
    }

    public function edit()
    {
        $this->emit('CourierTypeEdit',$this->editId);
    }

    public function render()
    {
        return view('livewire.components.admin.couriertype.update-courier-type');
    }
}
