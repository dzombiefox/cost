<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEngobesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('engobes', function(Blueprint $table) {
            $table->increments('id');
            $table->string('engobeName');
            $table->integer('sizeId');
            $table->string('weightWet');
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
        Schema::drop('engobes');
    }
}
