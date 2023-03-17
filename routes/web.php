<?php

use App\Http\Controllers\InterventionController;
use App\Http\Controllers\SolutionConroller;
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
    
    Route::get('/interventions',[InterventionController::class,'index'])->middleware('auth')->name('interventions');
    Route::get('/solutions',[SolutionConroller::class,'index'])->middleware('auth')->name('solutions');
    Route::get('/solutions/{id}',[SolutionConroller::class,'show'])->middleware('auth')->name('showSolution');
    Route::post('/solutions/create',[SolutionConroller::class,'create'])->middleware('auth')->name('createSolution');
    Route::post('/solutions/delete/{id}',[SolutionConroller::class,'delete'])->middleware('auth')->name('deleteSolution');
    
});

Route::get('/home',function(){
    $title = 'Dashboard';
    return view('home',compact('title'));
})->middleware('auth')->name('home');



