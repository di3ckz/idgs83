<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Catproblemas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catproblemas', function (Blueprint $table) {
            $table->increments('idcatproblema');
            $table->string('nombreProblema',20);
            $table->string('descripcionProblema',255);
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
