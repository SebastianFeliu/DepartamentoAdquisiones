<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = "pedido";
    protected $primaryKey = 'idPedido';
    protected $fillable = ['fecha_entrega','fecha_pedido','idProveedor','idBodega'];

    public function proveedor() {
        //Pertenece a un proveedor
        return $this
        ->belongsTo('App\Proveedor','idProveedor');
    }
    public function bodega() {
        //Pertenece a una bodega
        return $this
        ->belongsTo('App\Bodega','idBodega');
    }
}
