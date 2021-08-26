<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LoanTable', function (Blueprint $table) {
            $table->id();
            $table->string('userid',125);
            $table->string('loanid',125);
            $table->string('loan_amount');
            $table->string('loan_status');
            $table->string('loan_interest');
            $table->string('loan_total');
            $table->string('loan_tenure');
            $table->string('review_status');
            $table->string('initiator_userid');
            $table->string('approved_userid');
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
        Schema::dropIfExists('loan_tables');
    }
}
