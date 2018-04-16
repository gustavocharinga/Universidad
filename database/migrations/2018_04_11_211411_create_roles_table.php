<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*$config = config("permission.table-names");

        Schema::create($config['roles'], function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',120);
            $table->timestamps();
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*$config = config('laravel-permission.table_names');
        Schema::drop($config['roles']);*/
        //Schema::dropIfExists('roles');
    }
}
