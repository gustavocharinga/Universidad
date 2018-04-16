<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrelacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prelaciones', function (Blueprint $table) {
            $table->string('code_course_in');
            $table->string('code_course_pre');
            $table->foreign('code_course_in')->references('code_course')->on('cursos');
            $table->foreign('code_course_pre')->references('code_course')->on('cursos');
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
        Schema::dropIfExists('prelaciones');
    }
}
