<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Schedule3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('schedule3', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('nature_of_expenses');
            $table->float('total_amount', 12, 2);

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
        Schema::dropIfExists('schedule3');
    }
}
