<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CustomerDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('customer_details', function (Blueprint $table) {
            $table->id();
            $table->string('employment_type',125);
            $table->string('business_name',125);
            $table->string('company_address',125);
            $table->string('company_phonenumber',125);
            $table->string('risk_appetite',125);
            $table->string('turn_over',125);
            $table->string('loan_limit',125);
            $table->string('loan_manager_userid',125);
            $table->string('approved_status',125);
            $table->string('imageUrl')->nullable();;
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
        //
    }
}
