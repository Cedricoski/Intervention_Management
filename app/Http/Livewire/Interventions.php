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
    protected $listeners =['input'];
    public $queryAuteur;
    public $queryStatus;
    public $queryClient;
    public $datas = [];
    public $editDatas = [];
    public $deleteDatas = [];
    public $interventions = [];
    public $userID;
    public $queryDate;
    public $begin;
    public $end;
    public function mount()
    {
        if (isAdmin()) {
            $this->interventions = Intervention::all();
        } else {
            $this->interventions = auth()->user()->interventions;
        }
        
    }

    public function UpdatedQueryDate()
    {
        if ($this->queryDate!="") {
            $date_split = explode('-', $this->queryDate);
            $begin_str = str_replace('/', '-', $date_split[0]);
            $end_str = str_replace('/', '-', $date_split[1]);
            $this->begin = date('Y-m-d', strtotime($begin_str));
            $this->end = date('Y-m-d', strtotime($end_str));

            $query = Intervention::whereBetween('date', [$this->begin, $this->end]);
            if (in_array($this->queryStatus, ["true", "false"])) {
                $query = $query->where('status', filter_var($this->queryStatus, FILTER_VALIDATE_BOOLEAN));
            }
            if ($this->userID !== null && $this->queryAuteur > 2 && count($this->interventions) > 0) {
                $query = $query->where('user_id', $this->userID);
            }
            if (intval($this->queryClient) != 0) {
                $query = $query->where('client_id', intval($this->queryClient));
            }
            $this->interventions = $query->get();
        }else{
            $query = Intervention::query();
            if (in_array($this->queryStatus, ["true", "false"])) {
                $query = $query->where('status', filter_var($this->queryStatus, FILTER_VALIDATE_BOOLEAN));
            }
            if ($this->userID !== null && $this->queryAuteur > 2 && count($this->interventions) > 0) {
                $query = $query->where('user_id', $this->userID);
            }
            if (intval($this->queryClient) != 0) {
                $query = $query->where('client_id', intval($this->queryClient));
            }
            $this->interventions = $query->get();
        }
       
        
        
    }

    public function UpdatedQueryClient()
    {
        $words = $this->queryClient;

        if (intval($words) != 0) {
            $query = Intervention::where('client_id', intval($words));

            if (in_array($this->queryStatus, ["true", "false"])) {
                $query = $query->where('status', filter_var($this->queryStatus, FILTER_VALIDATE_BOOLEAN));
            }
            if ($this->userID !== null && $this->queryAuteur > 2 && count($this->interventions) > 0) {
                $query = $query->where('user_id', $this->userID);
            }
            if ($this->queryDate != ""){
                $query = $query->whereBetween('date', [$this->begin, $this->end]);
            }

            $this->interventions = $query->get();
        } else {
            $query = Intervention::query();
            if (in_array($this->queryStatus, ["true", "false"])) {
                $query = $query->where('status', filter_var($this->queryStatus, FILTER_VALIDATE_BOOLEAN));
            }
            if ($this->userID !== null && $this->queryAuteur > 2 && count($this->interventions) > 0) {
                $query = $query->where('user_id', $this->userID);
            }
            if ($this->queryDate != "") {
                $query = $query->whereBetween('date', [$this->begin, $this->end]);
            }
            
            $this->interventions = $query->get();
        }
        $this->resetPage();
    }

    public function UpdatedQueryStatus()
    {
        
        $words = $this->queryStatus;
        if (in_array($this->queryStatus, ["true", "false"])) {
            $query = Intervention::where('status', filter_var($words, FILTER_VALIDATE_BOOLEAN));
            if ($this->userID !== null && $this->queryAuteur > 2 && count($this->interventions) > 0) {
                $query = $query->where('user_id', $this->userID);
            }
            if (intval($this->queryClient) != 0) {
                $query =  $query->where('client_id', intval($this->queryClient));
            }
            if ($this->queryDate != "") {
                $query = $query->whereBetween('date', [$this->begin, $this->end]);
            }
            $this->interventions = $query->get();
        } else {
            if (isAdmin()) {
                $query = Intervention::query();
                if (intval($this->queryClient) != 0) {
                    $query = $query->where('client_id', intval($this->queryClient));
                }
                if ($this->userID !== null && $this->queryAuteur > 2 && count($this->interventions) > 0) {
                    $query = $query->where('user_id', $this->userID);
                }
                if ($this->queryDate != "") {
                    $query = $query->whereBetween('date', [$this->begin, $this->end]);
                }

                $this->interventions = $query->get();
            } else {
                $this->interventions = auth()->user()->interventions;
            }
        }

        $this->resetPage();
        
    }




    public function UpdatedQueryAuteur()
    {
        $this->reset('userID');
        $words = "%" . $this->queryAuteur . "%";
        $user_id = User::where('name', 'like', $words)->get('id');

        foreach ($user_id as $user) {
            $this->userID = $user->id;
        }

        if (strlen($this->queryAuteur) >= 2) {
            $query = Intervention::where('user_id', $this->userID);
            try {
                if (in_array($this->queryStatus, ["true", "false"])) {
                    $query = $query->where('status', filter_var($this->queryStatus, FILTER_VALIDATE_BOOLEAN));
                }
                if (intval($this->queryClient) != 0) {
                    $query = $query->where('client_id', intval($this->queryClient));
                }
                if ($this->queryDate != "") {
                    $query = $query->whereBetween('date', [$this->begin, $this->end]);
                }
                $this->interventions = $query->get();
            } catch (\Throwable $th) {
                $this->interventions = [];
            }
        } else {

            if (isAdmin()) {
                $query = Intervention::query();
                if (in_array($this->queryStatus, ["true", "false"])) {
                    $query = $query->where('status', filter_var($this->queryStatus, FILTER_VALIDATE_BOOLEAN));
                }
                if (intval($this->queryClient) != 0) {
                    $query = $query->where('client_id', intval($this->queryClient));
                }
                if ($this->queryDate != "") {
                    $query = $query->whereBetween('date', [$this->begin, $this->end]);
                }
                $this->interventions = $query->get();
            } else {
                $this->interventions = auth()->user()->interventions;
            }
        }

        $this->resetPage();
        
    }

    public function getDatas($id)
    {
        $this->datas = Intervention::where('id', $id)->get();
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

        unlink(public_path('storage/images/' . $image));
        Intervention::where('id', $id)->delete();

        return redirect()->route('interventions')->with('message', 'Suppression réussie');
    }



    public function render()
    {

        $intervent = paginate($this->interventions);
        $clients  = Client::all();
        return view('livewire.interventions', [
            'intervent' => $intervent,
            'clients' => $clients
        ]);
    }
}
