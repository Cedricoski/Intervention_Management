<?php

namespace App\Http\Livewire;

use App\Models\Intervention;
use App\Models\User;
use Livewire\Component;

class Total extends Component
{
    public $queryAuteur;
    public $queryDate;
    public $interventions;
    public $userID;
    public $onlineInterventions;
    public $offlineInterventions;
    public $begin;
    public $end;

    public function mount()
    {
        $this->interventions = Intervention::all();
        
    }

    public function UpdatedQueryDate()
    {
        if ($this->queryDate != "") {
            $date_split = explode('-', $this->queryDate);
            $begin_str = str_replace('/', '-', $date_split[0]);
            $end_str = str_replace('/', '-', $date_split[1]);
            $this->begin = date('Y-m-d', strtotime($begin_str));
            $this->end = date('Y-m-d', strtotime($end_str));

            $query = Intervention::whereBetween('date', [$this->begin, $this->end]);
            $query2 = Intervention::whereBetween('date', [$this->begin, $this->end]);
            
            if ($this->userID !== null && $this->queryAuteur > 2 && count($this->interventions) > 0) {
                $query = $query->where('user_id', $this->userID);
                $query2 = $query2->where('user_id', $this->userID);
            }
            
            $this->interventions = $query->get();
            $this->onlineInterventions = $query->where('status', 1)->get();
            $this->offlineInterventions = $query2->where('status', 0)->get();
        } else {
            $query = Intervention::query();
            $query2 = Intervention::query();
           
            if ($this->userID !== null && $this->queryAuteur > 2 && count($this->interventions) > 0) {
                $query = $query->where('user_id', $this->userID);
                $query2 = $query2->where('user_id', $this->userID);
            }
           
            $this->interventions = $query->get();
            $this->onlineInterventions = $query->where('status', 1)->get();
            $this->offlineInterventions = $query2->where('status', 0)->get();
        }
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
            $query2 = Intervention::where('user_id', $this->userID);
            try {
                if ($this->queryDate != "") {
                    $query = $query->whereBetween('date', [$this->begin, $this->end]);
                    $query2 = $query2->whereBetween('date', [$this->begin, $this->end]);
                }
                $this->interventions = $query->get();
                $this->onlineInterventions = $query->where('status',1)->get();
                $this->offlineInterventions = $query2->where('status', 0)->get();
                
            } catch (\Throwable $th) {
                $this->interventions = [];
            }
        } else {

            
                $query = Intervention::query();
                $query2 = Intervention::query();
                if ($this->queryDate != "") {
                    $query = $query->whereBetween('date', [$this->begin, $this->end]);
                    $query = $query2->whereBetween('date', [$this->begin, $this->end]);
                }
                $this->interventions = $query->get();
                $this->onlineInterventions = $query->where('status',1)->get();
                $this->offlineInterventions = $query2->where('status', 0)->get();
                
            
        }

        
    }

    public function render()
    {
        $interventions = $this->interventions;
        
        return view('livewire.total',['interventions'=>$interventions]);
    }
}
