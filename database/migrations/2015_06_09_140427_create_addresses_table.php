<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')-> on('users')->onDelete('cascade');

            $table->string('street');
            $table->string('town');
            $table->string('state');
            $table->string('zipcode');
            $table->string('country');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('addresses');
    }

}
