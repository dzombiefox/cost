<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inks', function(Blueprint $table) {
            $table->increments('id');
            $table->string('inkName');
            $table->integer('sizeId');
            $table->integer('colorId');
            $table->string('status');
            $table->string('status');
            $table->integer('userId');
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
        Schema::drop('inks');
    }
}
