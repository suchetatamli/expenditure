<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Schedule5 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('schedule5', function (Blueprint $table) {
            
            $table->increments('id');
            $table->date('date');
            $table->string('vehicle_regn_no_or_type');
            $table->string('vehicle_type');

            $table->float('hiring_rate_or_mentainance',12,2);
            $table->float('fuel_charges',12,2);
            $table->float('driver_charges',12,2);
            $table->integer('days_used');

            $table->float('total_amount', 12, 2);

            $table->float('candidate_or_agent', 12, 2);
            $table->float('pol_party', 12, 2);
            $table->float('other', 12, 2);
            
            $table->integer('party_id'); //Store the pol_party id
            $table->string('other_per_name'); //If drop by other track the name

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
        Schema::dropIfExists('schedule5');
    }
}
