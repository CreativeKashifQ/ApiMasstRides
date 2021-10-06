<?php

namespace App\Http\Livewire\Components\Admin\Content;

use App\Couriercontent;
use Livewire\Component;

class DeleteCourierContent extends Component
{
    public $couriercontentId;
    public function mount($couriercontentId)
    {
        $this->couriercontentId = $couriercontentId;
    }

    public function delete()
    {
        Couriercontent::where('id',$this->couriercontentId)->delete();
        $message = 'Courier Content With Price Deleted Successfully';
        $this->emit('CourierContentDeleted', $message);
    }
    public function render()
    {
        return view('livewire.components.admin.content.delete-courier-content');
    }
}
