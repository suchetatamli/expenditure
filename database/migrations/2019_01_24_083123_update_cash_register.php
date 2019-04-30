<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCashRegister extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cash_register', function (Blueprint $table) {
            $table->integer('user_id')->comment('id of the cms_users id form session')->change();
            $table->integer('election_id')->comment('id of the election master for which candidate is entering the data')->change();
            $table->integer('bank_register_id')->nullable()->default(0)->comment('bank register id, while cash out from bank register and enter into cash register')->change();
            $table->integer('trans_parent_id')->nullable()->default(0)->comment('id of the row connected which current transaction is working. eg. First cash collected and then deposited to bank on different day')->change();
            $table->dateTime('tran_date')->nullable()->default(null)->comment('Date of the transaction from user input')->change();
            $table->decimal('tran_amount',12,2)->nullable()->default(0.00)->comment('total amount')->change();
            $table->string('tran_source',30)->nullable()->default(null)->comment('providertype Self/Party/Others ')->change();
            $table->string('tran_source_name',50)->nullable()->default(null)->comment('provider name')->change();
            $table->text('tran_source_address')->nullable()->default(null)->comment('provider address')->change();
            $table->string('receipt_no',20)->nullable()->default(null)->comment('receipt, chq, draft, etc no')->change();
            $table->string('tran_purpose')->nullable()->default(null)->comment('purpose of the transaction')->change();
            $table->string('tran_purpose_other')->nullable()->default(null)->comment('purpose of the transaction other than listed')->change();
            $table->string('deposited_same_day',3)->nullable()->default('N')->comment('if cash deposited on the same day => Y')->change();
            $table->string('tran_method',20)->nullable()->default(null)->comment('transaction by chq, dd, payorder, etc')->change();
            $table->string('bank_deposited',5)->nullable()->default('Y')->comment('if deposit realised then Y')->change();
            $table->string('is_own_bank',5)->nullable()->default('N')->comment('IF transaction from own bank then Y')->change();
            $table->string('tran_source_bank_name',100)->nullable()->default(null)->comment('Provider bank name')->change();
            $table->string('tran_source_bank_branch')->nullable()->default(null)->comment('pprovider bank branch')->change();
            $table->string('tran_remarks')->nullable()->default(null)->comment('Remarks if any')->change();
            $table->string('tran_type',2)->nullable()->default(null)->comment('if deposit => Cr, if withdraw => Dr')->change();
            $table->string('tran_description',100)->nullable()->default(null)->comment('description of the transaction, user input')->change();
            $table->decimal('tran_quantity',12,2)->nullable()->default(1.00)->comment('no of item transact, default is 1')->change();
            $table->decimal('tran_rate',12,2)->nullable()->default(0.00)->comment('rate of the item')->change();   
            $table->integer('tran_receiver_id')->nullable()->default(0)->comment('id of the receiver, cms_users user_id if listed ')->change();
            $table->string('tran_receiver_name')->nullable()->default(0)->comment('name of the receiver')->change();
            $table->text('tran_receiver_address')->nullable()->default(0)->comment('address of the user')->change();
            $table->string('tag_schedule')->nullable()->default(0)->comment('tagged schedule 1 to 6')->change();
            $table->string('bank_consolidated',3)->nullable()->default('N')->comment('IF submited to bank then Y')->change();
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
