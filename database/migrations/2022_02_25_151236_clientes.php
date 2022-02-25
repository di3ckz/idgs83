<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Clientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('idcliente');
            $table->string('nombre',30);
            $table->string('telefono',10);
            $table->date('fechaAlta');
        //llave foranea tabla direcciones
            $table->integer('iddireccion')->unsigned();
            $table->foreign('iddireccion')->references('iddireccion')->on('direcciones');

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
        //
    }
}
