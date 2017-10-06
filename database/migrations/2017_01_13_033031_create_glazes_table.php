<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGlazesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glazes', function(Blueprint $table) {
            $table->increments('id');
            $table->string('glazeName');
            $table->integer('sizeId');
            $table->integer('colorId');
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
        Schema::drop('glazes');
    }
}
