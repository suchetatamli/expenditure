<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('user_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->date('date_result');
            $table->string('agent_name');
            $table->text('agent_address');	
            $table->string('acc_no');
            $table->string('bank_name');
            $table->integer('party_id');
            $table->string('guardian_name');
            $table->string('relation_wid_guardian');
            $table->date('dob');
            $table->string('is_active');
            $table->integer('language');
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
