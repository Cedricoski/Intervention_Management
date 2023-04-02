<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class EditClient extends Component
{
    public $name;
    public $address;
    public $email;
    public $editDatas;

    public function mount()
    {
        $this->name = $this->editDatas->name;
        $this->address = $this->editDatas->address;
        $this->email = $this->editDatas->email;
    }

    public function update($id)
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

        Client::where('id', $id)->update([
            'name' => $input['name'],
            'address' => $input['address'],
            'email' => $input['email'],

        ]);
        redirect()->route('clients')->with('message', 'Edition réussie');
    }
    public function render()
    {
        return view('livewire.edit-client');
    }
}
