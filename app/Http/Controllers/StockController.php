<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use App\Producto;
use App\Bodega;

class StockController extends Controller
{
    public function index()
    {
        $stock=Stock::orderBy('idStock','DESC')->paginate(20);
        return view('Stock.index',compact('stock'));
    }
    public function create()
    {
        $productos = Producto::all();
        $bodegas = Bodega::all();
        return view('Stock.create',compact('productos','bodegas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['idProducto'=>'required', 'idBodega'=>'required','cantidad'=>'required']);
        $stock = new Stock();
        $stock->idProducto = $request->idProducto;
        $stock->idBodega = $request->idBodega;
        $stock->cantidad = $request->cantidad;
        $stock->save();
        return redirect()->route('stock.index')->with('success','Stock creado satisfactoriamente');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idStock)
    {
        $stock = Stock::find($idStock);
        $productos = Producto::all();
        $bodegas = Bodega::all();
        return view('Stock.edit',compact('stock','productos','bodegas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idstock)
    {
        $this->validate($request,['idProducto'=>'required', 'idBodega'=>'required','cantidad'=>'required']);
        $stock = Stock::find($idstock);
        $stock->idProducto = $request->idProducto;
        $stock->idBodega = $request->idBodega;
        $stock->cantidad = $request->cantidad;
        $stock->save();
        return redirect()->route('stock.index')->with('success','Stock actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        stock::find($id)->delete();
        return redirect()->route('stock.index')->with('success','Stock eliminado correctamente');
    }
}
