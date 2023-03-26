<?php

namespace App\Http\Livewire;

use App\Models\User as ModelsUser;
use Livewire\Component;

class User extends Component
{
  
    public function render()
    {
        $users = paginate(ModelsUser::all());
        
        return view('livewire.user',compact('users'));
    }
}
