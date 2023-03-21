<?php

namespace App\Http\Livewire;

use App\Models\Intervention;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Interventions extends Component
{
    use WithPagination;
    
    public $datas=[];
    public $editDatas=[];
    public $deleteDatas=[];
    
    
    
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
        
        $interventions = paginate(auth()->user()->interventions);

        return view('livewire.interventions', [
            'interventions' => $interventions
        ]);
        
    }


}
