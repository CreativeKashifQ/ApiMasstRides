<?php

namespace App\Http\Livewire\Components\Admin\Courier;

use Livewire\Component;

class UpdateCourier extends Component
{
    public $editId;

    public function mount($courierId)
    {
        $this->editId = $courierId;
    }

    public function edit()
    {
        $this->emit('CourierEdit',$this->editId);

    }
    public function render()
    {
        return view('livewire.components.admin.courier.update-courier');
    }
}
