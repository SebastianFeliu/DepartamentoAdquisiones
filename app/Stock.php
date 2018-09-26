<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = "stock";
    protected $primaryKey = 'idStock';
    protected $fillable = ['cantidad','idProducto','idBodega'];

    public function producto() {
        //Pertenece a una sucursal
        return $this
        ->belongsTo('App\Producto','idProducto');
    }
    public function bodega() {
        //Pertenece a una sucursal
        return $this
        ->belongsTo('App\Bodega','idBodega');
    }
}
