<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial_num');
            $table->string('model');
            $table->string('chip_num', 30); // iccid
            $table->string('phone_num', 15);
            $table->string('apn');
            $table->string('client_id');
            $table->string('operator');
            $table->unsignedInteger('vehicle_id');
            $table->timestamps();
        });
        Schema::table('equipments', function (Blueprint $table) {
            $table->foreign('vehicle_id')
                ->references('id')->on('vehicles')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipments');
    }
}
