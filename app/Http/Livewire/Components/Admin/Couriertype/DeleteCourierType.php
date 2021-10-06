<?php

namespace App\Http\Livewire\Components\Admin\Couriertype;

use App\Couriertype;
use Livewire\Component;

class DeleteCourierType extends Component
{
    public $couriertypeId;
    public function mount($couriertypeId)
    {
        $this->couriertypeId = $couriertypeId;
    }

    public function delete()
    {
        Couriertype::where('id',$this->couriertypeId)->delete();
        $message = 'Courier Deleted Successfully';
        $this->emit('CourierTypeDeleted', $message);
    }
    public function render()
    {
        return view('livewire.components.admin.couriertype.delete-courier-type');
    }
}
