<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('inscripciones', function (Blueprint $table) {
            //$table->string('code_course');
            //$table->string('periodo');
           // $table->foreign('code_course')->references('code_course')->on('cursos');
            //$table->timestamps();
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('inscripciones');
    }
}
