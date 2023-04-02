<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Client extends Controller
{
    public function index()
    {
        $title = 'Clients';

        return view('clients.index', compact('title'));
    }
}
