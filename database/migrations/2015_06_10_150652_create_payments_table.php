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
			$table->timestamps();

            $table->string('title');
            $table->string('description')->nullable();

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
		});

        Schema::create('auction_payment', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();

            $table->integer('auction_id')->unsigned();
            $table->foreign('auction_id')->references('id')->on('auctions')->onDelete('cascade');

            $table->integer('payment_id')->unsigned();
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');
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
        Schema::drop('auction_payment');
	}

}
