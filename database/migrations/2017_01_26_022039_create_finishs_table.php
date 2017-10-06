<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFinishsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finishs', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('motifId');
            $table->integer('sizeId');
            $table->integer('colorId');
            $table->string('opt');
            $table->integer('month');
            $table->integer('year');
            $table->integer('bodyId');
            $table->integer('aluminaId');
            $table->integer('engobeId');
            $table->integer('glazeId');
            $table->integer('dropId');
            $table->integer('userId');
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
        Schema::drop('finishs');
    }
}
