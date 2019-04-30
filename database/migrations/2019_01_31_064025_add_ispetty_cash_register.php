<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIspettyCashRegister extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('cash_register', function (Blueprint $table) {
            //
            $table->integer('is_petty')->default(0)->comment('1 if petty cash withdraw');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cash_register', function($table) {
            $table->dropColumn('is_petty');
        });
    }
}
