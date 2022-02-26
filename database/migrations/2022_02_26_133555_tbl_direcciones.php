<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblDirecciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbldirecciones', function (Blueprint $table) {
            $table->increments('PKTblReportes');
            $table->integer('FKCatPoblaciones')->unsigned();
            $table->text('coordenadas');
            $table->text('referencias');
            $table->text('direccion');
            $table->foreign('FKCatPoblaciones')->references('PKCatPoblaciones')->on('tblcatpoblaciones');
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
