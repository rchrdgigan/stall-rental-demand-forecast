<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tenant;

class Payments extends Component
{
    public $selectedTenant = null;

    public function render()
    {
        return view('livewire.payments',[
            'tenants' => Tenant::all(),
            'tenants_details' => Tenant::where('id', $this->selectedTenant)->first(),
        ]);
    }
}
