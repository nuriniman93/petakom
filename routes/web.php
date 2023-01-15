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

//Routes for Manage Activity
Route::get('/Manage Activity/activityListCommitteePage', function(){
    return view('Manage Activity/activityListCommitteePage');
});

Route::get('/Manage Activity/activityDetailsCommitteePage', function(){
    return view('Manage Activity/activityDetailsCommitteePage');
});

Route::get('/Manage Activity/addActivityPage', function(){
    return view('Manage Activity/addActivityPage');
});

Route::get('/Manage Activity/editActivityPage', function(){
    return view('Manage Activity/editActivityPage');
});

Route::get('/Manage Activity/activityListUsersPage', function(){
    return view('Manage Activity/activityListUsersPage');
});

Route::get('/Manage Activity/activityDetailsUsersPage', function(){
    return view('Manage Activity/activityDetailsUsersPage');
});

/* Nurin Iman */
//Routes for Manage Proposal
Route::get('/Manage Proposal/addProposalPage', function(){
    return view('Manage Proposal/addProposalPage');
});

Route::get('/Manage Proposal/editProposalPage', function(){
    return view('Manage Proposal/editProposalPage');
});

Route::get('/Manage Proposal/proposalDetailsPage', function(){
    return view('Manage Proposal/proposalDetailsPage');
});

Route::get('/Manage Proposal/proposalMenuPage', function(){
    return view('Manage Proposal/proposalMenuPage');
});

/*Route::prefix('Manage Proposal')->name("Manage Proposal.")->group(function(){
    Route::get('/user', function () {
        return "user";
        //URI: /staff/user
        //Route name: staff.
    })->name("index");
    Route::post('/user', function () {
        return "user";
        //URI: /staff/user
        //Route name: staff.index
    });
    Route::get('/user/{id}', function ($id) {
        return "user/".$id;
        //URI: /staff/user/1
    })->name("dashboard");
    Route::put('/user/{id}', function ($id) {
        return "user/".$id." put";
    });
    Route::delete('/user/{id}', function ($id) {
        return "user/".$id." delete";
    });
    Route::get('/user/{id}/edit', function ($id) {
        return "user/".$id."/edit";
    })->name("edit");
    Route::get('/user/{id}/create', function ($id) {
        return "user/".$id."/create";
    })->name("create");
    
});*/


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
