<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turmas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num_aluno', 7)->unique();
            $table->string('turma', 50);
            $table->unsignedInteger('aluno_id');
            $table->string('serie', 50);
            $table->timestamps();
        });
        Schema::table('turmas', function (Blueprint $table) {
            $table->foreign('aluno_id')
                ->references('id')
                ->on('turmas')
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
        Schema::dropIfExists('turmas');
    }
}
