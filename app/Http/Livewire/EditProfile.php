<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class EditProfile extends Component
{
    public $name;
    public $pseudo;
    public $email;
    public $role_id;
    public $password;
    public $password_confirmation;

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->pseudo = auth()->user()->pseudo;
        $this->email = auth()->user()->email;
        $this->role_id = auth()->user()->role_id;
       
    }

    public function update($id)
    {  
        
        $input = [
            'name'=> $this->name,
            'pseudo'=> $this->pseudo,
            'email'=> $this->email,
            'role_id' => $this->role_id,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
        ];

        Validator::make($input,[
            'name'=>['required','string'],
            'pseudo'=>['required','string'],
            'email'=>['required','email'],
            'role_id'=>['required'],
            'password' => ['confirmed'],
            
            
        ])->validate();
        
        if ($input['password']) {
            
            User::where('id',$id)->update([
                'name'=> $input['name'],
                'pseudo' => $input['pseudo'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'role_id' => $input['role_id']
            ]);
            redirect()->route('profile')->with('message','Edition réussie');
        }else {
            
            User::where('id',$id)->update([
                'name' => $input['name'],
                'pseudo' => $input['pseudo'],
                'email' => $input['email'],
                'role_id' => $input['role_id'],
                
            ]);
            redirect()->route('profile')->with('message', 'Edition réussie');
        }
    }

    
    public function render()
    {
        $roles = Role::all();
        return view('livewire.edit-profile',[
            "roles"=>$roles
        ]);
    }
}
