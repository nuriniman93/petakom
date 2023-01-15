<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function(){
    return view('homepage');
});

Route::get('/homepage', function(){
    return view('homepage');
});

Route::get('/Manage Registration/RegNewMem', function(){
    return view('Manage Registration/RegNewMem');
});

Route::get('/Manage Committee Election/Student/StudCandidateListPage', function () {
    return view('Manage Committee Election/Student/StudCandidateListPage');
});

Route::get('/Manage Committee Election/Student/VotingPage', function () {
    return view('Manage Committee Election/Student/VotingPage');
});

Route::get('/Manage Committee Election/Student/ElectionResultPage', function () {
    return view('Manage Committee Election/Student/ElectionResultPage');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
