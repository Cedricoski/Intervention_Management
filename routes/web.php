<?php

use App\Http\Controllers\InterventionController;
use App\Http\Controllers\SolutionConroller;
use App\Http\Controllers\User;
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

Route::group(['middleware','auth'], function(){
    
    Route::get('/interventions',[InterventionController::class,'index'])->name('interventions');
    Route::get('/solutions',[SolutionConroller::class,'index'])->name('solutions');
    Route::get('/solutions/{id}',[SolutionConroller::class,'show'])->name('showSolution');
    Route::post('/solutions/create',[SolutionConroller::class,'create'])->name('createSolution');
    Route::post('/solutions/delete/{id}',[SolutionConroller::class,'delete'])->name('deleteSolution');
    Route::get('/profile',[User::class,'showProfile'])->name('profile');
});

Route::get('/home',function(){
    $title = 'Dashboard';
    return view('home',compact('title'));
})->middleware('auth')->name('home');



