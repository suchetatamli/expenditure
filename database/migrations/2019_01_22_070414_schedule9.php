<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Schedule9 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('schedule9', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('address');
            $table->date('date');
            $table->string('cash');
            $table->string('dd_or_cheque_no');
            $table->string('loan_or_gift',10);
            $table->float('total_amount', 12, 2);
            $table->integer('cash_register');
            $table->integer('bank_register');
            $table->text('remarks');

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
        Schema::dropIfExists('schedule9');
    }
}
