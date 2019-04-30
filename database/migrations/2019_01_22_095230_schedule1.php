<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Schedule1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('schedule1', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nature_id'); //foreign_key table: sc1_nature_of_expenditure 

            $table->float('total_amount', 12, 2);
            // Source of expenditure is the comb of 3 field below
            // Total amount is the comb of these 3 flds I'e Incurred by
            $table->float('candidate_or_agent', 12, 2);
            $table->float('pol_party', 12, 2);
            $table->float('other', 12, 2);
            $table->integer('party_id');
            // If party invested something, it should be noted.
            // come from party tabl
            $table->string('other_per_name'); //If drop by other, track the name
            $table->date('date');
            $table->integer('bank_reg_id');
            $table->timestamps();
            $table->index(['nature_id']);
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
        Schema::dropIfExists('schedule1');
    }
}
