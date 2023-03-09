<?php

namespace App\Http\Livewire;

use App\Models\Solution;
use App\Models\TypeIntervention;
use Livewire\Component;

class AddInterventionForm extends Component
{
    public $intervention_type;
    public $solutions;
   
    public function render()
    {
        $this->solutions = Solution::all();
        $this->intervention_type = TypeIntervention::all();
        return view('livewire.add-intervention-form');
    }
}
