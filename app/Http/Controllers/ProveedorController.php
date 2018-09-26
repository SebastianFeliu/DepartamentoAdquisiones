<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores=Proveedor::orderBy('idProveedor','DESC')->paginate(20);
        return view('Proveedor.index',compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Proveedor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['localidad'=>'required', 'nombreProveedor'=>'required']);
        $proveedor = new Proveedor();
        $proveedor->localidad = $request->localidad;
        $proveedor->nombreProveedor = $request->nombreProveedor;
        $proveedor->save();
        return redirect()->route('proveedores.index')->with('success','Proveedor creado satisfactoriamente');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idProveedor)
    {
        $proveedor = Proveedor::find($idProveedor);
        return view('Proveedor.edit',compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idProveedor)
    {
        $this->validate($request,[ 'localidad'=>'required', 'nombreProveedor'=>'required']);
        $proveedor = Proveedor::find($idProveedor);
        $proveedor->localidad = $request->localidad;
        $proveedor->nombreProveedor = $request->nombreProveedor;
        $proveedor->save();
        return redirect()->route('proveedores.index')->with('success','Proveedor actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Proveedor::find($id)->delete();
        return redirect()->route('proveedores.index')->with('success','Proveedor eliminado correctamente');
    }
}
