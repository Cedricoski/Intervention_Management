<?php

namespace App\Http\Livewire;

use App\Models\Solution;
use Livewire\Component;

class Search extends Component
{
    public $query;
    public $solutions = [];
    public int $selectedIndex = 0;
    
    public function updatedQuery()
    {
        $words = '%'. $this->query .'%';
        if ( strlen($this->query)>=2) {
            $this->solutions = Solution::where('title','like',$words)
            ->orwhere('description','like',$words)->get();
        }
        
    }

    public function incrementIndex()
    {
        if ($this->selectedIndex===count($this->solutions)-1) {
            $this->selectedIndex=0;
        }
        else{
            $this->selectedIndex++;
        }

        
    }

    public function decrementIndex()
    {
        if ($this->selectedIndex===0) {
            $this->selectedIndex=count($this->solutions)-1;
        }
        else{
            $this->selectedIndex--;
        }

        
    }

    public function resetIndex()
    {
        $this->reset('selectedIndex');
    }

    public function showSolution()
    {
      if (collect($this->solutions)->isNotEmpty()) {
        return redirect()->route('showSolution',['id'=>$this->solutions[$this->selectedIndex]['id']]);
      }  
      
        
    }

    public function render()
    {
        return view('livewire.search');
    }
}
