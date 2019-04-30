<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCashRegister extends Migration
{
    /**
     * Run the migrations.
     *    
     * @return void
     */
    public function up()
    {
        Schema::create('cash_register', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('election_id');
            $table->integer('bank_register_id');
            $table->integer('trans_parent_id');
            $table->dateTime('tran_date');
            $table->decimal('tran_amount',12,2);
            $table->string('tran_source',30);
            $table->string('tran_source_name',50);
            $table->text('tran_source_address');
            $table->string('receipt_no',20);
            $table->string('tran_purpose');
            $table->string('tran_purpose_other');
            $table->string('deposited_same_day',3);
            $table->string('tran_method',20);
            $table->string('bank_deposited',5);
            $table->string('is_own_bank',5);
            $table->string('tran_source_bank_name',100);
            $table->string('tran_source_bank_branch');
            $table->string('tran_remarks');
            $table->string('tran_type',2);
            $table->string('tran_description',100);
            $table->decimal('tran_quantity',12,2);
            $table->decimal('tran_rate',12,2);    
            $table->integer('tran_receiver_id');
            $table->string('tran_receiver_name');
            $table->text('tran_receiver_address');
            $table->string('tag_schedule');
            $table->string('bank_consolidated',3);
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
    }
}
