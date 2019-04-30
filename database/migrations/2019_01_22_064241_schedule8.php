<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Schedule8 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('schedule8', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('party_id');
            $table->date('date');
            $table->string('cash');
            $table->string('dd_or_cheque_no');
            $table->float('total_amount', 12, 2);
            $table->integer('cash_register');
            $table->integer('bank_register');
            $table->text('remarks');
            $table->index(['party_id']);
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
        Schema::dropIfExists('schedule8');
    }
}
