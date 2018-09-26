<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos=Producto::orderBy('idProducto','DESC')->paginate(20);
        return view('Producto.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['nombreProducto'=>'required', 'tipoProducto'=>'required','fechaVencimiento'=>'required']);
        $producto = new Producto();
        $producto->nombreProducto = $request->nombreProducto;
        $producto->tipoProducto = $request->tipoProducto;
        $producto->fechaVencimiento = $request->fechaVencimiento;
        $producto->save();
        return redirect()->route('productos.index')->with('success','Producto creado satisfactoriamente');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idProducto)
    {
        $producto = Producto::find($idProducto);
        return view('Producto.edit',compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idproducto)
    {
        $this->validate($request,['nombreProducto'=>'required', 'tipoProducto'=>'required','fechaVencimiento'=>'required']);
        $producto = producto::find($idproducto);
        $producto->nombreProducto = $request->nombreProducto;
        $producto->tipoProducto = $request->tipoProducto;
        $producto->fechaVencimiento = $request->fechaVencimiento;
        $producto->save();
        return redirect()->route('productos.index')->with('success','Producto actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        producto::find($id)->delete();
        return redirect()->route('productos.index')->with('success','producto eliminado correctamente');
    }
}
