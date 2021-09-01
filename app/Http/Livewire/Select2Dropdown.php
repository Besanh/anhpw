<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Select2Dropdown extends Component
{
    public $status;
    public function render()
    {
        $arr = getStatus();
        return view('livewire.select2-dropdown', compact('arr'));
    }
}
