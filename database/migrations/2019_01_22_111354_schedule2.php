<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Schedule2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('schedule2', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('venue'); 
            $table->string('name_of_star_campaigne'); 
            $table->float('candidate_or_agent', 12, 2);
            $table->float('pol_party', 12, 2);
            $table->float('other', 12, 2);
            $table->integer('party_id'); //Store the pol_party id
            $table->string('other_per_name'); //If drop by other track the name
            $table->text('remarks');
            $table->integer('bank_reg_id');
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
        Schema::dropIfExists('schedule2');
    }
}
