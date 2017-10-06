<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMotifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motifs', function(Blueprint $table) {
            $table->increments('id');
            $table->string('motifCode');
            $table->string('motifName');
            $table->integer('typeId');
            $table->integer('brandId');
            $table->integer('optionId');
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
        Schema::drop('motifs');
    }
}
