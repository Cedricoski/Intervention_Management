<?php

namespace App\Http\Livewire;

use App\Models\Intervention;
use Livewire\Component;

class Interventions extends Component
{
    public $interventions;
    public $datas=[];
    public $editDatas=[];
    

    public function getDatas($id)
    {
        $this->datas = Intervention::where('id',$id)->get();
       
    }

    public function getDataForEdit($id)
    {
        $this->editDatas = Intervention::where('id',$id)->get();
       
    }

    public function render()
    {
        return view('livewire.interventions',[
            'interventions'=>$this->interventions
        ]);
    }
}
