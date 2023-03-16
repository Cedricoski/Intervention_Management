<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class InterventionController extends Controller
{
    public function index()
    {
        $title = 'Interventions';
        
        return view('interventions.index',compact('title'));
    }

    

    public function create(Request $request)
    {
        
    }
}
