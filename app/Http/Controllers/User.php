<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User extends Controller
{
   public function showProfile()
   {
        $title = 'Profil';
        return view('users.profile',compact('title')); 
   }
}
