<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuctionsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("auctions", function(Blueprint $table)
        {
            $table->increments("id");
            $table->timestamps();

            $table->integer('seller_id')->unsigned();
            $table->foreign('seller_id')->references('id')->on('users')->onDelete('set null');

            $table->integer('winner_id')->unsigned()->nullable();
            $table->foreign('winner_id')->references('id')->on('users')->onDelete('set null');

            $table->string("title");
            $table->text("description");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('auctions');
    }

}
