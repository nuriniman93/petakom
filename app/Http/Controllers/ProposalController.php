<?php

namespace App\Http\Controllers;

use App\Models\ProposalRecord;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ProposalController extends Controller
{
    public function index()
    {
        //DB
        $proposals = ProposalRecord::all();
        return view('ManageProposal.proposalMenuPage', compact('proposals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //untk show form shj untuk masukkan data
        //proposal page view/ManageProposal.addProposalPage
        return view('ManageProposal.addProposalPage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //proses submit dekat form bila tkan bttn
        $input = new ProposalRecord;

        //ikut migration
        $input->proposal_title = $request->proposal_title;
        $input->proposal_author = $request->proposal_author;
        $input->proposed_date = $request->proposed_date;
        $input->status_coordinator = $request->status_coordinator;
        $input->status_hosd = $request->status_hosd;
        $input->status_dean = $request->status_dean;
        $input->proposal_objectives = $request->proposal_objectives;
        $input->proposal_descrption = $request->proposal_descrption;
        $input->proposal_budget = $request->proposal_budget;
        $input->proposal_file = $request->proposal_file;

        if ($request->hasFile('proposal_file')) {
            $file = $request->file('proposal_file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('files/proposalFile', $filename); //
            $input->proposal_file = $filename;
        }

        $input->save();

        //kembali ke interface asal

        return redirect('proposalMenuPage')
            ->with('success', 'New Proposal Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($ProposalID)
    {

        //poposal page view/ManageProposal.proposalDetailsPage

        $proposals = ProposalRecord::find($ProposalID);
        return view('ManageProposal.proposalDetailsPage')
            ->with('proposals', $proposals);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($ProposalID)
    {
        $proposals = ProposalRecord::find($ProposalID);
        return view('ManageProposal.editProposalPage', compact('proposals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $ProposalID)
    {

        $proposals = ProposalRecord::find($ProposalID);
        $input = $request->all();
        $proposals->update($input);

        return redirect('proposalMenuPage')
            ->with('success', 'Proposal Successfully Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($ProposalID)
    {
        ProposalRecord::destroy($ProposalID);

        return redirect('proposal')
            ->with('success', 'Proposal Successfully Deleted');
    }

    public function updateStatus(Request $request)
    {
        $proposal = ProposalRecord::find($request->id);
        $proposal->update([$request->column => $request->status]);
        return redirect('proposal')
            ->with('success', 'Proposal Successfully Deleted');
    }
}
