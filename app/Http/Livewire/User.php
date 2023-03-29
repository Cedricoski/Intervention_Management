<?php

namespace App\Http\Livewire;

use App\Models\User as ModelsUser;
use Livewire\Component;

class User extends Component
{
    public $deleteDatas;
    public $editDatas;

    public function delete($id)
    {
        if ($id) {
            ModelsUser::where('id', $id)->delete();
            redirect()->route('users')->with('message', 'Suppression réussie');
        }
        
    
    }

    public function getDataForEdit($id)
    {
        $this->editDatas = ModelsUser::find($id);
    }

    public function getDataForDelete($id)
    {
        $this->deleteDatas = ModelsUser::find($id);
    }

    public function resetDeleteDatas()
    {
        $this->reset('deleteDatas');
    }

    public function resetEditDatas()
    {
        $this->reset('editDatas');
    }
  
    public function render()
    {
        $users = paginate(ModelsUser::all());
        
        return view('livewire.user',compact('users'));
    }
}
