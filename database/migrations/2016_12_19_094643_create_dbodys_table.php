<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDbodysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dbodys', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('bodyId');
            $table->integer('itemId');
            $table->string('volume');
            $table->integer('category');
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
        Schema::drop('dbodys');
    }
}
