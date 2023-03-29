<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class AddUser extends Component
{
    public $name;
    public $pseudo;
    public $email;
    public $role_id;
    public $password;
    public $password_confirmation;
    public $editDatas;

    public function create()
    {
        

        $input = [
            'name' => $this->name,
            'pseudo' => $this->pseudo,
            'email' => $this->email,
            'role_id' => $this->role_id,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
        ];

        Validator::make($input, [
            'name' => ['required', 'string'],
            'pseudo' => ['required', 'string'],
            'email' => ['required', 'email'],
            'role_id' => ['required'],
            'password' => ['required','confirmed'],
            'password_confirmation' => ['required'],


        ])->validate();

        

            User::create([
                'name' => $input['name'],
                'pseudo' => $input['pseudo'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'role_id' => $input['role_id']
            ]);
            redirect()->route('users')->with('message', 'Ajout réussi');
       
    }

    public function render()
    {
        $roles = Role::all();
        return view('livewire.add-user', [
            "roles" => $roles
        ]);
    }
}
