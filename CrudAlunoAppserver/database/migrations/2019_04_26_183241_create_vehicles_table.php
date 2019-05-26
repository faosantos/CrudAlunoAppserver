<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('placa', 7)->unique();
            $table->unsignedInteger('client_id');
            $table->string('brand', 50);
            $table->string('model', 50);
            $table->string('color', 50);
            $table->year('year');
            $table->enum('type', ['car', 'bike', 'truck', 'utility'])->default('car');
            $table->timestamps();
        });
        Schema::table('vehicles', function (Blueprint $table) {
            $table->foreign('client_id')
                ->references('id')
                ->on('clients')
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
        Schema::dropIfExists('vehicles');
    }
}
