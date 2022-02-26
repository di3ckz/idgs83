<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblclientes', function (Blueprint $table) {
            $table->increments('PKTblReportes');
            $table->integer('FKCatProblemas')->unsigned();
            $table->string('nombreCliente');
            $table->string('telefono', 10);
            $table->date('fechaAlta');
            $table->foreign('FKCatProblemas')->references('PKCatProblemas')->on('tblreportes');
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
