<?php

namespace App\Http\Livewire;

use App\Models\Intervention;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Interventions extends Component
{
    use WithPagination;
    public $queryAuteur;
    public $queryStatus;    
    public $datas=[];
    public $editDatas=[];
    public $deleteDatas=[];
    public $interventions=[];

    public function mount()
    {
        if (isAdmin()) {
            $this->interventions = Intervention::all();
        }else {
            $this->interventions = auth()->user()->interventions;
        }
        
    }

    public function UpdatedQueryStatus()
    {
        
        $words = $this->queryStatus;
        if (in_array($this->queryStatus,["true","false"])) {
            $this->interventions = Intervention::where('status', filter_var($words, FILTER_VALIDATE_BOOLEAN))->get();

        }else {
            $this->interventions = auth()->user()->interventions;
        }
            
        
    }

    public function UpdatedQueryAuteur()
    {
        
        $words ="%".$this->queryAuteur."%";
        $user_id=User::where('name','like', $words)->get('id');
        foreach($user_id as $user){
            $id = $user->id;
        }
        if(strlen($this->queryAuteur) >= 2) {
            try {
                $this->interventions = Intervention::where('user_id', 'like', $id)->get();
            } catch (\Throwable $th) {
                $this->interventions = [];
            }
        }else {

            if (isAdmin()) {
                $this->interventions = Intervention::all();
            } else {
                $this->interventions = auth()->user()->interventions;
            }
        }
       
       
        
    }
    
    public function getDatas($id)
    {
        $this->datas = Intervention::where('id',$id)->get();
    }

    public function getDataForEdit($id)
    {
        $this->editDatas = Intervention::find($id);   
    }

    public function getDataForDelete($id)
    {
        $this->deleteDatas = Intervention::find($id);
    }

    public function resetDatas()
    {
        $this->reset('datas');
    }

    public function resetEditDatas()
    {
        $this->reset('editDatas');
    }

    public function resetDeleteDatas()
    {
        $this->reset('deleteDatas');
    }

    public function delete($id)
    {
        $intervention = Intervention::where('id', $id)->get('image');
        foreach ($intervention as $key) {
            $image = $key->image;
        }

        unlink(public_path('storage/images/'.$image));
        Intervention::where('id', $id)->delete();

        return redirect()->route('interventions')->with('message', 'Suppression réussie');
    }
    
    public function render()
    {
        if($this->queryAuteur !== null){
            $interventions = $this->interventions;
        }else{
            $interventions = paginate(auth()->user()->interventions);
        }
        

        return view('livewire.interventions', [
            'interventions' => $interventions
        ]);
        
    }


}
