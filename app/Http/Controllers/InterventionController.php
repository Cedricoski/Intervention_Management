<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;


class InterventionController extends Controller
{
    public function index()
    {
        $title = 'Interventions';
  
        return view('interventions.index',compact('title'));
    }

    

    

    
}
