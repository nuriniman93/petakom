<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id('ProposalID');
            $table->string('proposal_title', 255);
            $table->string('proposal_author', 50);
            $table->date('proposed_date');
            $table->string('status_coordinator', 20)->nullable();
            $table->string('status_hosd', 20)->nullable();
            $table->string('status_dean', 20)->nullable();
            $table->string('proposal_objectives', 255);
            $table->string('proposal_descrption', 255);
            $table->double('proposal_budget');
            $table->string('proposal_file');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposals');
    }
};
