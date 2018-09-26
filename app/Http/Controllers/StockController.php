<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $sucursales=Sucursal::orderBy('idSucursal','DESC')->paginate(20);
        return view('Sucursal.index',compact('sucursales'));
    }
}
