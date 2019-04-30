<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sc1NatureOfExpenditure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('sc1_nature_of_expenditure', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->enum('is_active', ['Y', 'N']); //Is active enum fld
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
        Schema::dropIfExists('sc1_nature_of_expenditure');
    }
}
