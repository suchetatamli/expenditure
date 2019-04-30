<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBankDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_bank_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('election_id')->default(1);
            $table->string('bank_name',100)->nullable()->default(null);
            $table->string('branch_name',100)->nullable()->default(null);
            $table->string('bank_address')->nullable()->default(null);
            $table->string('bank_ifsc',25)->nullable()->default(null);
            $table->integer('status')->nullable()->default(1);
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
