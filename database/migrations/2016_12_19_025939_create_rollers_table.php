<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRollersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rollers', function(Blueprint $table) {
            $table->increments('id');
            $table->string('rollerCode');
            $table->string('rollerName');
            $table->string('subCode');
            $table->string('status');
            $table->string('motif');
            $table->string('lifeTime');
            $table->string('price');
            $table->string('printing');
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
        Schema::drop('rollers');
    }
}
