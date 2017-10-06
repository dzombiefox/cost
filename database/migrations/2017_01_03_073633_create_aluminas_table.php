<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAluminasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluminas', function(Blueprint $table) {
            $table->increments('id');
            $table->string('aluminaName');
            $table->integer('sizeId');
            $table->string('status');
            $table->string('weightPcs');
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
        Schema::drop('aluminas');
    }
}
