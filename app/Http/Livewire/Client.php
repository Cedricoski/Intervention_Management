<?php

namespace App\Http\Livewire;

use App\Models\Client as ModelsClient;
use Livewire\Component;

class Client extends Component
{
    public $deleteDatas;
    public $editDatas;

    public function delete($id)
    {
        if ($id) {
            ModelsClient::where('id', $id)->delete();
            redirect()->route('clients')->with('message', 'Suppression réussie');
        }
    }

    public function getDataForEdit($id)
    {
        $this->editDatas = ModelsClient::find($id);
    }

    public function getDataForDelete($id)
    {
        $this->deleteDatas = ModelsClient::find($id);
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
        $clients = paginate(ModelsClient::all());
        return view('livewire.client',['clients'=>$clients]);
    }
}
