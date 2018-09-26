<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sucursal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::defaultStringLength(191);    
    Schema::create('sucursal', function (Blueprint $table) {
        $table->increments('idSucursal');
        $table->string('direccion');
        $table->string('nombreSucursal');
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
    Schema::dropIfExists('sucursal');
}
}
