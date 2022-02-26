<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblReportes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblreporte', function (Blueprint $table) {
            $table->increments('PKTblReportes');
            $table->integer('FKCatProblemas')->unsigned();
            $table->integer('FKTblEmpleadosRecibio')->unsigned();
            $table->integer('FKCatStatus')->unsigned();
            $table->integer('FKTblDetalleReporte')->unsigned();
            $table->integer('FKTblClientes')->unsigned();
            $table->string('descripcionProblema');
            $table->string('observaciones');
            $table->date('fechaAlta');
            $table->foreign('PKCatProblemas')->references('PKCatProblemas')->on('catproblemas');
            $table->foreign('PKTblEmpleados')->references('PKTblEmpleados')->on('tblempleados');
            $table->foreign('PKCatStatus')->references('PKCatStatus')->on('catstatus');
            $table->foreign('PKTblDetalleReporte')->references('PKTblDetalleReporte')->on('tbldetallereporte');
            $table->foreign('PKTblClientes')->references('PKTblClientes')->on('tblclientes');
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
