<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
        
    class ExpenditureLimits extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            //
            Schema::create('expenditure_limits', function (Blueprint $table) {
                
                $table->increments('id');
                $table->integer('state_id'); // Store the state_id id which is related to the country
                $table->string('limit_type',32); // Limit Exhausted, Limit Available
                $table->integer('limit');
                $table->enum('is_active', ['Y', 'N']);
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
            Schema::dropIfExists('expenditure_limits');
        }

    }