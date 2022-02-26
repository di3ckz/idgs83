<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblDetalleReporte extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbldetallereporte', function (Blueprint $table) {
            $table->increments('PKTblEmpleados');
            $table->string('diagnostico');
            $table->string('solucion');
            $table->integer('FKTblEmpleadosActualizo')->unsigned();
            $table->string('fechaActualizacion');
            $table->integer('FKTblEmpleadosAtencion')->unsigned();
            $table->date('fechaAtencion');
            $table->integer('FKTblEmpleadosAtediendo')->unsigned();
            $table->date('fechaAtendiendo');
            $table->foreign('PKTblEmpleados')->references('PKTblEmpleados')->on('tblempleados');
            $table->foreign('PKTblEmpleados')->references('PKTblEmpleados')->on('tblempleados');
            $table->foreign('PKTblEmpleados')->references('PKTblEmpleados')->on('tblempleados');
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
