<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTranBrkupToCashRegister extends Migration
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
            $table->decimal('tran_amount_brkup_ow',12,2)->nullable()->default(0.00)->comment('own contribution to the transaction. with default value o');
            $table->decimal('tran_amount_brkup_pt',12,2)->nullable()->default(0.00)->comment('party contribution to the transaction. with default value o');
            $table->decimal('tran_amount_brkup_ot',12,2)->nullable()->default(0.00)->comment('other person contribution to the transaction. with default value o');
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
        	$table->dropColumn('tran_amount_brkup_ow');
        	$table->dropColumn('tran_amount_brkup_pt');
	        $table->dropColumn('tran_amount_brkup_ot');
	    });
    }
}
