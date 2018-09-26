<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Producto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
    Schema::defaultStringLength(191);
    Schema::create('producto', function (Blueprint $table) {
        $table->increments('idProducto');
        $table->string('nombreProducto');
        $table->string('tipoProducto');
        $table->date('fechaVencimiento');
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
    Schema::dropIfExists('producto');

}
}
