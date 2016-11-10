<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payments', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('service_name')->nullable();
            $table->string('business_number')->nullable();
            $table->string('transaction_reference')->nullable();
            $table->string('internal_transaction_id')->nullable();
            $table->string('transaction_timestamp')->nullable();
            $table->string('transaction_type')->nullable();
            $table->string('account_number')->nullable();
            $table->string('sender_phone')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->float('amount', 15,2)->default(0);
            $table->string('currency')->nullable();
            $table->string('signature')->nullable();
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
		Schema::drop('payments');
	}

}
