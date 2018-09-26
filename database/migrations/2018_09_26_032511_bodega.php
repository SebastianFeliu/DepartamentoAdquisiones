<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bodega extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('bodega', function (Blueprint $table) {
            $table->increments('idBodega');
            $table->string('nombreBodega');
            $table->string('tipoBodega');
            $table->integer('capacidad');
            $table->string('codigoOrden');
            $table->string('ubicacion');
            $table->integer('idSucursal')->unsigned();
            $table->foreign('idSucursal')->references('idSucursal')->on('sucursal')->onDelete('cascade');
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
        Schema::dropIfExists('bodega');

    }
}
