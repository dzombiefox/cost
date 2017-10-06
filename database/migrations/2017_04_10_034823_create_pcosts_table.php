<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePcostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pcosts', function(Blueprint $table) {
            $table->increments('pcost_id');
            $table->integer('sizeId');
            $table->integer('capacity');
            $table->string('f_employeeBenefit');
            $table->string('f_fuelExp');
            $table->string('f_waterElectict');
            $table->string('f_packingExp');
            $table->string('f_maintenanceExp');
            $table->string('f_depreciationExp');
            $table->string('f_otherExp');
            $table->string('c_salary');
            $table->string('c_employeeBenefit');
            $table->string('c_carriageCharge');
            $table->string('c_otherExp');
            $table->string('c_mktOperational');
            $table->string('c_salesIncentives');
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
        Schema::drop('pcosts');
    }
}
