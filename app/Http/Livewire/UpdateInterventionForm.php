<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Solution;
use App\Models\TypeIntervention;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateInterventionForm extends Component
{
    use WithFileUploads;
    public $intervention_type;
    public $solutions;
    public $clients;
    public $editDatas;
    
    public $name;
    public $date;
    public $status;
    public $image;
    public $user_id;
    public $client_id;
    public $type_interventions_id;
    public $solution_id;
    
    public function render()
    {
        
        $this->solutions = Solution::all();
        $this->intervention_type = TypeIntervention::all();
        $this->clients=Client::all();
        return view('livewire.update-intervention-form');
    }
}
