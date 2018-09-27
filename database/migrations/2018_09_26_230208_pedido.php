<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pedido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('pedido', function (Blueprint $table) {
            $table->increments('idPedido');
            $table->date('fecha_pedido');
            $table->date('fecha_entrega');
            $table->integer('idBodega')->unsigned();
            $table->foreign('idBodega')->references('idBodega')->on('bodega')->onDelete('cascade');
            $table->integer('idProveedor')->unsigned();
            $table->foreign('idProveedor')->references('idProveedor')->on('proveedor')->onDelete('cascade');
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
