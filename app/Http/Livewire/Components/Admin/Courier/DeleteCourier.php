<?php

namespace App\Http\Livewire\Components\Admin\Courier;

use App\Courier;
use Livewire\Component;

class DeleteCourier extends Component
{
    public $courierId;
    public function mount($courierId)
    {
        $this->courierId = $courierId;
    }

    public function delete()
    {
        Courier::where('id',$this->courierId)->delete();
        $message = 'Courier Detail Deleted Successfully';
        $this->emit('CourierDeleted', $message);
    }
    public function render()
    {
        return view('livewire.components.admin.courier.delete-courier');
    }
}
