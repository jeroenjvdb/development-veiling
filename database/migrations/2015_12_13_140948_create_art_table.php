<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('art', function(Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('artist_id')->unsigned();
            $table->foreign('artist_id')->references('id')->on('artists');
            $table->integer('style_id')->unsigned();
            $table->foreign('style_id')->references('id')->on('styles');

            $table->date('date_of_creation');
            $table->integer('est_low_price');
            $table->integer('est_high_price');
            $table->integer('buyout')->nullable();
            $table->datetime('end_datetime');
            $table->string('width');
            $table->string('height');
            $table->string('depth')->nullable();
            $table->string('color');
            $table->string('title');
            $table->string('description_nl');
            $table->string('description_en');
            $table->string('condition_nl');
            $table->string('condition_en');

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
        Schema::drop('art');
    }
}
