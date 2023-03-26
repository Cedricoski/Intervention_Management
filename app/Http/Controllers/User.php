<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use Illuminate\Http\Request;

class User extends Controller
{
   public function index()
   {
      $title = 'Utilisateurs';
   
      return view('users.index',compact('title'));  
   }
   public function showProfile()
   {
        $title = 'Profil';
        return view('users.profile',compact('title')); 
   }
}
