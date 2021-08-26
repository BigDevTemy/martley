<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LoanStructure', function (Blueprint $table) {
            $table->id();
            $table->string('userid',125);
            $table->string('loanid',125);
            $table->string('amount');
            $table->string('due_date');
            $table->string('status');
            $table->string('initiator_userid');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan_structures');
    }
}
