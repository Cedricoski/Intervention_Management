<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditSolution extends Component
{
    public $solution;
    
    public function render()
    {
        return view('livewire.edit-solution');
    }
}
