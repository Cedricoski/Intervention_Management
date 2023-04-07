<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Intervention;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\URL;
class Interventions extends Component
{
    use WithPagination;
    public $queryAuteur;
    public $queryStatus;    
    public $queryClient;
    public $datas=[];
    public $editDatas=[];
    public $deleteDatas=[];
    public $interventions=[];
    public $userID;

    public function mount()
    {
        if (isAdmin()) {
            $this->interventions = Intervention::all();
        }else {
            $this->interventions = auth()->user()->interventions;
        }
        
    }

    public function UpdatedQueryClient()
    {
        $words = $this->queryClient;
        
            if (intval($words)!=0) {
                $query = Intervention::where('client_id',intval($words));
        
                if (in_array($this->queryStatus,["true","false"])) {
                    $query=$query->where('status', filter_var($this->queryStatus, FILTER_VALIDATE_BOOLEAN));
                    
                }
               
                $this->interventions = $query->get();
                
                
            }else{
                if (in_array($this->queryStatus,["true","false"])) {
                    $this->interventions=Intervention::where('status', filter_var($this->queryStatus, FILTER_VALIDATE_BOOLEAN))->get();
                    
                }else{
                    $this->interventions = Intervention::all();
                }
                
            }
            $this->resetPage();
           
    }

    public function UpdatedQueryStatus()
    {
        
        $words = $this->queryStatus;
        if (in_array($this->queryStatus,["true","false"])) {
            if ($this->userID !== null && $this->queryAuteur>2 && count($this->interventions)>0) {
                $this->interventions = Intervention::where('status', filter_var($words, FILTER_VALIDATE_BOOLEAN))->where('user_id',$this->userID)->get();
            }else{
                $this->interventions = Intervention::where('status', filter_var($words, FILTER_VALIDATE_BOOLEAN))->get();
            }
            

        }else {
            if (isAdmin()) {
                $this->interventions = Intervention::all();
            }else{
                $this->interventions = auth()->user()->interventions;
            }
            
        }
        
        $this->resetPage();
        
    }


    

    public function UpdatedQueryAuteur()
    {
        
        $words ="%".$this->queryAuteur."%";
        $user_id=User::where('name','like', $words)->get('id');
        
        foreach($user_id as $user){
            $this->userID = $user->id;
            
        }
        
        if(strlen($this->queryAuteur) >= 2) {
            
            try {
                if (in_array($this->queryStatus,["true","false"])) {
                    $this->interventions = Intervention::where('user_id', 'like', $this->userID)->where('status',filter_var($this->queryStatus, FILTER_VALIDATE_BOOLEAN))->get();
                }else{
                    $this->interventions = Intervention::where('user_id', 'like', $this->userID)->get();
                    
                    
                }
                
            } catch (\Throwable $th) {
                $this->interventions = [];
                
            }
        }else {

            if (isAdmin()) {
                if (in_array($this->queryStatus,["true","false"])) {
                    $this->interventions = Intervention::where('status',filter_var($this->queryStatus, FILTER_VALIDATE_BOOLEAN))->get();
                }else{
                    $this->interventions = Intervention::all();
                }
                
            } else {
                $this->interventions = auth()->user()->interventions;
            }
        }
       
       $this->resetPage();
       $this->reset('userID');
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
        
        $intervent = paginate($this->interventions);
        $clients  = Client::all();
        return view('livewire.interventions', [
            'intervent'=>$intervent,
            'clients'=>$clients
        ]);
        
    }


}
