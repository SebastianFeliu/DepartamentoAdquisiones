<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    protected $table = "bodega";
    protected $primaryKey = 'idBodega';
    protected $fillable = ['nombreBodega','tipoBodega','capacidad','codigoOrden','ubicacion','idSucursal'];

    public function sucursal() {
        return $this
        ->belongsTo('App\Sucursal','idSucursal');
    }
}
