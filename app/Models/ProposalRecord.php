<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalRecord extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'proposals';
    protected $primaryKey = 'ProposalID';

    //attributes
    protected $fillable = [
        'proposal_title',
        'proposal_author',
        'proposed_date',
        'status_coordinator',
        'status_hosd',
        'status_dean',
        'proposal_objectives',
        'proposal_descrption',
        'proposal_budget',
        'proposal_file',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

}
