<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sc6NatureExpenses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('sc6_nature_expenses', function (Blueprint $table) {
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
        Schema::dropIfExists('sc6_nature_expenses');
    }
}
