<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBodysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bodys', function(Blueprint $table) {
            $table->increments('id');
            $table->string('bodyName');
            $table->string('choose');
            $table->integer('sizeId');
            $table->integer('status');
            $table->integer('periodeId');
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
        Schema::drop('bodys');
    }
}
