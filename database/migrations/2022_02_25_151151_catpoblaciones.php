<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Catpoblaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catpoblaciones', function (Blueprint $table) {
            $table->increments('idcatpoblacion');
            $table->string('nombrePoblacion',20);
            $table->string('codigopostal',5);
            $table->date('fechaAlta');
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
