<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            //$table->increments('id');
            $table->Integer('cedula')->unique();
            $table->string('name');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->timestamps();
            $table->foreign('cedula')->references('cedula')->on('users')->onDelete('cascade');
            $table->primary(['cedula', 'email']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiantes');
    }
}
