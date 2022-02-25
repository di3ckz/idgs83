<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Detallereportes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallereporte', function (Blueprint $table) {
            $table->increments('iddetallereporte');
            $table->string('diagnostico',255);
            $table->string('solucion',255);
            $table->date('fechaActualizacion');
            $table->date('fechaAtencion');
            $table->date('fechaAtendiendo');
            //llaves foraneas tabla empleados 
            $table->integer('idempleadoactualizo')->unsigned();
            $table->foreign('idempleado')->references('idempleado')->on('empleados');
            $table->integer('idempleadoatencion')->unsigned();
            $table->foreign('idempleado')->references('idempleado')->on('empleados');
            $table->integer('idempleadoarendiendo')->unsigned();
            $table->foreign('idempleado')->references('idempleado')->on('empleados');
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
