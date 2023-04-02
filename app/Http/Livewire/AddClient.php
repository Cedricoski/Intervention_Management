<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class AddClient extends Component
{
    public $name;
    public $address;
    public $email;
    

    

    public function create()
    {

        $input = [
            'name' => $this->name,
            'address' => $this->address,
            'email' => $this->email,

        ];

        Validator::make($input, [
            'name' => ['required', 'string'],
            'address' => ['required', 'string'],
            'email' => ['required', 'email'],


        ])->validate();

        Client::create([
            'name' => $input['name'],
            'address' => $input['address'],
            'email' => $input['email'],

        ]);
        redirect()->route('clients')->with('message', 'Ajout réussie');
    }
    public function render()
    {
        return view('livewire.add-client');
    }
}
