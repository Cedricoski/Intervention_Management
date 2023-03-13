<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Intervention;
use App\Models\Solution;
use App\Models\TypeIntervention;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddInterventionForm extends Component
{
    use WithFileUploads;
    public $intervention_type;
    public $solutions;
    public $clients;
    

    public $name;
    public $date;
    public $status;
    public $image;
    public $user_id;
    public $client_id;
    public $type_interventions_id;
    public $solution_id;

    

    public function create()
    {
        $input = [
            'name'=>$this->name,
            'date'=>$this->date,
            'status'=>$this->status,
            'image'=>$this->image,
            'client_id'=>$this->client_id,
            'type_interventions_id'=>$this->type_interventions_id,
            'solution_id'=>$this->solution_id,
        ];

        
        
        Validator::make($input,[
            'name'=>['required', 'string', 'max:255'],
            'date'=>['required'],
            'image'=>['required','image'],
            'client_id'=>['required'],
            'type_interventions_id'=>['required'],
            'solution_id'=>['required'],
        ])->validate();
        
        
        $input['image']->store('images','public');
        Intervention::create([
            'name'=>$input['name'],
            'date'=>$input['date'],
            'status'=>$input['status'],
            'image'=>$input['image']->hashName(),
            'client_id'=>intval($input['client_id']),
            'type_interventions_id'=>intval($input['type_interventions_id']),
            'solution_id'=>intval($input['solution_id']),
        ]);
        return redirect()->route('interventions')->with('message','Ajout reussi');
    }
   
    public function render()
    {
        $this->solutions = Solution::all();
        $this->intervention_type = TypeIntervention::all();
        $this->clients=Client::all();
        return view('livewire.add-intervention-form');
    }
}
