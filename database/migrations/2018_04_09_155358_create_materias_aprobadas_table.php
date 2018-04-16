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
            $table->decimal('nota');
            $table->string('periodo');
            $table->foreign('code_course')->references('code_course')->on('cursos');


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
