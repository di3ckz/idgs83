<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reportes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportes', function (Blueprint $table) {
            $table->increments('idreporte');
            $table->string('descripcionProblema',255);
            $table->string('observaciones',255);
            $table->integer('idcatproblema')->unsigned();
            $table->foreign('idcatproblema')->references('idcatproblema')->on('catproblemas');
            $table->integer('idempleadorecibio')->unsigned();
            $table->foreign('idempleado')->references('idempleado')->on('empleados');
            $table->integer('idcatstatu')->unsigned();
            $table->foreign('idcatstatu')->references('idcatstatu')->on('catstatus');
            $table->integer('iddetallereporte')->unsigned();
            $table->foreign('iddetallereporte')->references('iddetallereporte')->on('detallereportes');
            $table->integer('idcliente')->unsigned();
            $table->foreign('idcliente')->references('idcliente')->on('clientes');
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
