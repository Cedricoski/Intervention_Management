<?php

use App\Http\Controllers\Client;
use App\Http\Controllers\InterventionController;
use App\Http\Controllers\SolutionConroller;
use App\Http\Controllers\User;
use App\Models\Client as ModelsClient;
use App\Models\Intervention;
use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});



Route::group(['middleware'=>'auth'], function(){
    
    Route::get('/interventions',[InterventionController::class,'index'])->name('interventions');
    Route::post('/interventions',[InterventionController::class,'test'])->name('test');
    Route::get('/solutions',[SolutionConroller::class,'index'])->name('solutions');
    Route::get('/solutions/{id}',[SolutionConroller::class,'show'])->name('showSolution');
    Route::post('/solutions/create',[SolutionConroller::class,'create'])->name('createSolution');
    Route::post('/solutions/delete/{id}',[SolutionConroller::class,'delete'])->name('deleteSolution');
    Route::get('/profile',[User::class,'showProfile'])->name('profile');
    Route::get('/users', [User::class, 'index'])->name('users');
    Route::get('/clients', [Client::class, 'index'])->name('clients');
    
});

Route::get('/home',function(){
    $title = 'Dashboard';
    $interventions = Intervention::all();
    $interventions_by_client = ModelsClient::all();
    $interventions_by_user = ModelsUser::all();
    return view('home',compact('title','interventions', 'interventions_by_client', 'interventions_by_user'));
})->middleware('auth')->name('home');



