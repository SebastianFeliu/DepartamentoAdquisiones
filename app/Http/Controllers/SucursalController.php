<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sucursal;

class SucursalController extends Controller
{
    public function index()
    {
        $sucursales=Sucursal::orderBy('idSucursal','DESC')->paginate(20);
        return view('Sucursal.index',compact('sucursales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Sucursal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['direccion'=>'required', 'nombreSucursal'=>'required']);
        $sucursal = new Sucursal();
        $sucursal->direccion = $request->direccion;
        $sucursal->nombreSucursal = $request->nombreSucursal;
        $sucursal->save();
        return redirect()->route('sucursales.index')->with('success','Sucursal creada satisfactoriamente');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idSucursal)
    {
        $sucursal = Sucursal::find($idSucursal);
        return view('Sucursal.edit',compact('sucursal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idSucursal)
    {
        $this->validate($request,[ 'direccion'=>'required', 'nombreSucursal'=>'required']);
        $sucursal = Sucursal::find($idSucursal);
        $sucursal->direccion = $request->direccion;
        $sucursal->nombreSucursal = $request->nombreSucursal;
        $sucursal->save();
        return redirect()->route('sucursales.index')->with('success','Sucursal actualizada satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sucursal::find($id)->delete();
        return redirect()->route('sucursales.index')->with('success','Sucursal eliminada correctamente');
    }
}
