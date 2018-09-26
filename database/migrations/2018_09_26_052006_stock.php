<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Stock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('stock', function (Blueprint $table) {
            $table->increments('idStock');
            $table->integer('cantidad');
            $table->integer('idProducto')->unsigned();
            $table->foreign('idProducto')->references('idProducto')->on('producto')->onDelete('cascade');
            $table->integer('idBodega')->unsigned();
            $table->foreign('idBodega')->references('idBodega')->on('bodega')->onDelete('cascade');
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
        Schema::dropIfExists('stock');

    }
}
