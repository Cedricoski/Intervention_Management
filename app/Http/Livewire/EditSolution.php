<?php

namespace App\Http\Livewire;

use App\Models\Solution;
use Illuminate\Http\Request;
use Livewire\Component;

class EditSolution extends Component
{
    public $title;
    public $description;
    public $solution;

    public function mount()
    {
        $this->title = $this->solution->title;
        $this->description = $this->solution->description;
    }

    public function update($id)
    {
        
        Solution::where('id', $id)->update(
            [
                'title' => $this->title,
                'description' => $this->description,
            ]
        );
        return redirect()->route('showSolution', ['id' => $id])->with('message', 'Edition réussie');
    }

    public function render()
    {
        return view('livewire.edit-solution');
    }
}
