<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePastasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pastas', function(Blueprint $table) {
            $table->increments('id');
            $table->string('pastaName');
            $table->integer('sizeId');
            $table->integer('colorId');
            $table->string('options');
            $table->string('weightWet');
            $table->string('status');
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
        Schema::drop('pastas');
    }
}
