<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInkindToBankRegister extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('bank_register', function (Blueprint $table) {
            //
            $table->integer('inkind')->default(0)->comment('1 if goods or service is recieved in kind');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bank_register', function($table) {
            $table->dropColumn('inkind');
        });
    }
}
