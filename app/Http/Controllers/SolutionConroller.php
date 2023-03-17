<?php

namespace App\Http\Controllers;

use App\Models\Solution;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SolutionConroller extends Controller
{
    public function index()
    {
        $title = "Solutions";
        $solutions = Solution::paginate(5);
        return view('solutions.index', compact('solutions','title'));
    }

    public function show(Solution $id)
    {
        $title = $id->title;
        return view('solutions.show',[
            'solution'=>$id,
            'title'=>$title
        ]);       
    }

    public function delete($id)
    {
        Solution::where('id',$id)->delete();
        return redirect()->route('solutions')->with('message','Suppression réussie');       
    }
}
