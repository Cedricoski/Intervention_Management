<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Livewire\Component;

class EditProfile extends Component
{
    public $name;
    public $pseudo;
    public $email;
    public $role_id;
    public $password;
    public $confirm_password;

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->pseudo = auth()->user()->pseudo;
        $this->email = auth()->user()->email;
        $this->role_id = auth()->user()->role_id;
       
    }

    
    public function render()
    {
        $roles = Role::all();
        return view('livewire.edit-profile',[
            "roles"=>$roles
        ]);
    }
}
