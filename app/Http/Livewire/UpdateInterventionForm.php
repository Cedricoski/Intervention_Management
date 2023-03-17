<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Intervention;
use App\Models\Solution;
use App\Models\TypeIntervention;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
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
    public bool $status;
    public $image;
    public $oldImage;
    public $hashName;
    public $user_id;
    public $client_id;
    public $type_interventions_id;
    public $solution_id;

    public function mount()
    {
       
            $this->name = $this->editDatas->name;
            $this->date = $this->editDatas->date;
            $this->status = $this->editDatas->status;
            $this->image = $this->editDatas->image;
            $this->oldImage = $this->editDatas->image;
            $this->user_id = $this->editDatas->user_id;
            $this->client_id = $this->editDatas->client_id;
            $this->type_interventions_id = $this->editDatas->type_interventions_id;
            $this->solution_id = $this->editDatas->solution_id;
            $this->hashName = $this->image;
            
       
       
    }

    public function update($id)
    {
        $input = [
            'name' => $this->name,
            'date' => $this->date,
            'status' => $this->status,
            'image' => $this->image,
            'client_id' => $this->client_id,
            'type_interventions_id' => $this->type_interventions_id,
            'solution_id' => $this->solution_id,
        ];



        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'date' => ['required'],
            'client_id' => ['required'],
            'type_interventions_id' => ['required'],
            'solution_id' => ['required'],
        ])->validate();

        if ($input['image'] !== $this->oldImage) {
            unlink(public_path('storage/images/' . $this->oldImage));
            $input['image']->store('images', 'public');
            $this->hashName=$input['image']->hashName();

            
        }
        
        Intervention::where('id',$id)->update([
            'name' => $input['name'],
            'date' => $input['date'],
            'status' => $input['status'],
            'image' => $this->hashName,
            'client_id' => intval($input['client_id']),
            'type_interventions_id' => intval($input['type_interventions_id']),
            'solution_id' => intval($input['solution_id']),
        ]);
        return redirect()->route('interventions')->with('message', 'Edition reussi');
    }
    

    public function statut()
    {
        if ($this->status) {
            
            $this->status=false;
        }else{
            $this->status=true;
        }
    }
    
    public function render()
    {
        
        $this->solutions = Solution::all();
        $this->intervention_type = TypeIntervention::all();
        $this->clients=Client::all();
        return view('livewire.update-intervention-form',['editDatas'=>$this->editDatas]);
    }
}
