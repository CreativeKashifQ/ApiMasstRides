<?php

namespace App\Http\Livewire\Components\Admin\Weight;

use App\Courierweight;
use Livewire\Component;

class DeleteCourierWeight extends Component
{
    public $courierId;
    public function mount($courierId)
    {
        $this->courierId = $courierId;
    }

    public function delete()
    {
        Courierweight::where('id',$this->courierId)->delete();
        $message = 'Courier With Price & Locations Deleted Successfully';
        $this->emit('CourierWeightDeleted', $message);
    }
    public function render()
    {
        return view('livewire.components.admin.weight.delete-courier-weight');
    }
}
