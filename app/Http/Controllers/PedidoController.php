<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Bodega;
use App\Proveedor;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos=Pedido::orderBy('idPedido','DESC')->paginate(20);
        return view('pedido.index',compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores = Proveedor::all();
        $bodegas = Bodega::all();
        return view('pedido.create',compact('proveedores','bodegas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['fecha_pedido'=>'required', 'fecha_entrega'=>'required','idProveedor'=>'required','idBodega'=>'required']);
        $pedido = new Pedido();
        $pedido->fecha_pedido = $request->fecha_pedido;
        $pedido->fecha_entrega = $request->fecha_entrega;
        $pedido->fecha_entrega = $request->fecha_entrega;
        $pedido->idProveedor = $request->idProveedor;
        $pedido->idBodega = $request->idBodega;
        $pedido->save();
        return redirect()->route('pedidos.index')->with('success','Pedido creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pedido = Pedido::find($id);
        $proveedores = Proveedor::all();
        $bodegas = Bodega::all();
        return view('pedido.edit',compact('proveedores','bodegas','pedido'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,['fecha_pedido'=>'required', 'fecha_entrega'=>'required','idProveedor'=>'required','idBodega'=>'required']);
        $pedido = Pedido::find($id);
        $pedido->fecha_pedido = $request->fecha_pedido;
        $pedido->fecha_entrega = $request->fecha_entrega;
        $pedido->idProveedor = $request->idProveedor;
        $pedido->idBodega = $request->idBodega;
        $pedido->save();
        return redirect()->route('pedidos.index')->with('success','Pedido actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pedido::find($id)->delete();
        return redirect()->route('pedidos.index')->with('success','Pedido eliminado correctamente');
    }
}
