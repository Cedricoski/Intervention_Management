<?php

namespace App\Http\Livewire;

use App\Models\Solution;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class FormAdd extends Component
{
    public $title;
    public $description;
    public function Create()
    {
       $input=[
        'title'=>$this->title,
        'description'=>$this->description,
       ];

       

        Validator::make($input, [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required','string', 'max:255'],
        ])->validate();

        Solution::create([
            'title' => $input['title'],
            'description' => $input['description'],
        ]);
        
        return redirect()->route('solutions')->with('message','Ajout reussi');
    }
    public function render()
    {
        return view('livewire.form-add');
    }
}
