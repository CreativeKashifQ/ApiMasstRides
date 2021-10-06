<?php

namespace App\Http\Livewire\Components\Admin\Courier;

use App\Courier;
use Livewire\Component;

class CompleteCourier extends Component
{
    public $courierId;

    public function mount($courierId)
    {
        $this->courierId = $courierId;
    }

    public function pending()
    {
        $courier = Courier::where('id',$this->courierId)->first();
        $courier->status = 0;
        $courier->save();
        $message = 'Courier Status Pended';
        $this->emit('CourierPended',$message);
    }
    public function render()
    {
        return view('livewire.components.admin.courier.complete-courier');
    }
}
