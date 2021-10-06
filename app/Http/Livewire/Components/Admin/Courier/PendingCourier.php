<?php

namespace App\Http\Livewire\Components\Admin\Courier;

use App\Courier;
use Livewire\Component;

class PendingCourier extends Component
{
    public $courierId;
    public function mount($courierId)
    {
        $this->courierId = $courierId;

    }

    public function complete()
    {
       $courier = Courier::where('id',$this->courierId)->first();
       $courier->status = 1;
       $courier->save();
       $message = 'Courier Status Completed';
       $this->emit('CourierCompleted',$message);
    }
    public function render()
    {
        return view('livewire.components.admin.courier.pending-courier');
    }
}
