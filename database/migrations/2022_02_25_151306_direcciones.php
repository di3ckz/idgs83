<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Direcciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->increments('iddireccion');
            $table->text('referencias');
            $table->text('coordenadas');
            $table->text('referencias');
            $table->text('direccion');
            //llave forane tabla poblaciones
            $table->integer('idcatpoblacion')->unsigned();
            $table->foreign('idcatpoblacion')->references('idcatpoblacion')->on('poblaciones');
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
