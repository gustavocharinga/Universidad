<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantesCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes_cursos', function (Blueprint $table) {
            $table->Integer('cedula')->unique();
            $table->string('code_course')->unique();
            $table->string('periodo')->unique();
            $table->foreign('cedula')->references('cedula')->on('estudiantes')->onDelete('cascade');
            $table->foreign('code_course')->references('code_course')->on('cursos')->onDelete('cascade');

            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiantes_cursos');
    }
}
