<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Empleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('idempleado');
            $table->string('nombreUsuario',20);
            $table->string('apellidoPaterno',20);
            $table->string('apellidoMaterno',20);
            $table->string('usuario',20);
            $table->string('password',10);
            //llave foranea tabla catroles
            $table->integer('idcatrol')->unsigned();
            $table->foreign('idcatrol')->references('idcatrol')->on('catroles');
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
