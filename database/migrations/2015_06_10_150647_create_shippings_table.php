<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shippings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

            $table->string('title');
            $table->double('price');
            $table->string('shipsTo');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});

        Schema::create('auction_shipping', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();

            $table->integer('auction_id');
            $table->foreign('auction_id')->references('id')->on('auctions')->onDelete('cascade');

            $table->integer('shipping_id');
            $table->foreign('shipping_id')->references('id')->on('shippings')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('shippings');
        Schema::drop('auction_shipping');
	}

}
