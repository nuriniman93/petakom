<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProposalController;

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
//Routes for ManageProposal
Route::resource("proposal", ProposalController::class);
Route::get('proposalMenuPage', [App\Http\Controllers\ProposalController::class,'index']);
Route::get('editProposalPage/{ProposalID}', [App\Http\Controllers\ProposalController::class,'edit']);

Route::post('editProposalPage/updateProposalPage/{ProposalID}', [App\Http\Controllers\ProposalController::class,'update']);
Route::get('addProposalPage', [App\Http\Controllers\ProposalController::class,'create']);
Route::post('addProposalPage', [App\Http\Controllers\ProposalController::class,'store']);
Route::get('destroyProposal/{ProposalID}', [App\Http\Controllers\ProposalController::class,'destroy'])->name('destroy-proposal');
Route::get('update-status', [App\Http\Controllers\ProposalController::class,'updateStatus'])->name('update-status');


//go to page
Route::get('/ManageProposal/addProposalPage', function(){
    return view('ManageProposal/addProposalPage');
});

Route::get('/ManageProposal/editProposalPage', function(){
    return view('ManageProposal/editProposalPage');
});

Route::get('/ManageProposal/proposalDetailsPage', function(){
    return view('ManageProposal/proposalDetailsPage');
});

Route::get('/ManageProposal/proposalMenuPage', function(){
    return view('ManageProposal/proposalMenuPage');
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
