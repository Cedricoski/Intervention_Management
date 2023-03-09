<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InterventionController extends Controller
{
    public function index()
    {
        $title = 'Interventions';
        $interventions = auth()->user()->interventions;

        return view('interventions.index',compact('interventions','title'));
    }
    public function create(Request $request)
    {
        
    }
}
