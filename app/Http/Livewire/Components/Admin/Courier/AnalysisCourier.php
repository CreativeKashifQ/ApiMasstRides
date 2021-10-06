<?php

namespace App\Http\Livewire\Components\Admin\Courier;

use App\Courier;
use Livewire\Component;

class AnalysisCourier extends Component
{
    public function render()
    {
        $pending_couriers = Courier::where('status',0)->count();
        $complete_couriers = Courier::where('status',1)->count();
        $all_couriers = Courier::all()->count();
        return view('livewire.components.admin.courier.analysis-courier',compact('all_couriers','pending_couriers','complete_couriers'))->layout('layouts.app1');
    }
}
