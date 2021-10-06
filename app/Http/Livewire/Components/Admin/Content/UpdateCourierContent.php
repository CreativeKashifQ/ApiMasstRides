<?php

namespace App\Http\Livewire\Components\Admin\Content;

use Livewire\Component;

class UpdateCourierContent extends Component
{
    public $editId;

    public function mount($couriercontentId)
    {
        $this->editId = $couriercontentId;
    }

    public function edit()
    {
        $this->emit('CourierContentEdit',$this->editId);
    }
    public function render()
    {
        return view('livewire.components.admin.content.update-courier-content');
    }
}
