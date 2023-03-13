<?php

namespace App\Http\Livewire;

use App\Models\Solution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Solutions extends Component
{
    
    public $solution;
    
    public function goBack()
    {
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.solutions');
    }
}
