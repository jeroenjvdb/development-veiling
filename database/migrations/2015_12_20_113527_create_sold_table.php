<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sold', function(Blueprint $table) {
            $table->increments('id');

            $table->integer('art_id')->unsigned();
            $table->foreign('art_id')->references('id')->on('art');

            $table->integer('buyer_id')->unsigned();
            $table->foreign('buyer_id')->references('id')->on('users');

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
        Schema::drop('sold');
    }
}
