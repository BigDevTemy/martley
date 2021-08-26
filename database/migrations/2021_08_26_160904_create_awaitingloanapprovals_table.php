<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAwaitingloanapprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('awaitingloanapproval', function (Blueprint $table) {
            $table->id();
            $table->string('userid',125);
            $table->string('fullname',125);
            $table->string('loan_amount',125);
            $table->string('loan_manager_userid',125);
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
        Schema::dropIfExists('awaitingloanapprovals');
    }
}
