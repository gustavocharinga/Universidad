<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateriasAprobadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias_aprobadas', function (Blueprint $table) {
            $table->string('code_course');
            $table->string('periodo');
            $table->decimal('nota');
            $table->foreign('code_course')->references('code_course')->on('estudiantes_cursos')->onDelete('cascade');
            $table->foreign('periodo')->references('periodo')->on('estudiantes_cursos');

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
        Schema::dropIfExists('materias_aprobadas');
    }
}
