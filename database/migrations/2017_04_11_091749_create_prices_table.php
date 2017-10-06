<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function(Blueprint $table) {
            $table->increments('price_id');
            $table->integer('motifId');
            $table->integer('sizeId');
            $table->integer('colorId');
            $table->string('skw_1');
            $table->string('skw_2');
            $table->string('skw_3');
            $table->string('skw_4');
            $table->string('skw_5');
            $table->string('salesInc');
            $table->string('salesBonus');
            $table->integer('periodeId');
            $table->string('year');
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
        Schema::drop('prices');
    }
}
