<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PartyMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('party_master', function (Blueprint $table) {
            $table->increments('id');
            $table->string('party_name');
            $table->text('party_address');
            $table->float('cash_in_hand', 8, 2);
            //YEs /No - 1=Yes 0=NO
            $table->integer('recognised_party');
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
        Schema::dropIfExists('party_master');
    }
}
