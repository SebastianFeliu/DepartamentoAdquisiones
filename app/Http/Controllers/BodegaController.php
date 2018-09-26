<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bodega;
use App\Sucursal;

class BodegaController extends Controller
{
    public function index()
    {
        $bodegas=Bodega::orderBy('idBodega','DESC')->paginate(20);
        return view('Bodega.index',compact('bodegas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sucursales = Sucursal::all();
        return view('Bodega.create',compact('sucursales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['nombreBodega'=>'required','tipoBodega'=>'required','capacidad'=>'required',
        'codigoOrden'=>'required','ubicacion'=>'required','idSucursal'=>'required']);
        $bodega = new Bodega();
        $bodega->nombreBodega = $request->nombreBodega;
        $bodega->tipoBodega = $request->tipoBodega;
        $bodega->capacidad = $request->capacidad;
        $bodega->codigoOrden = $request->codigoOrden;
        $bodega->ubicacion = $request->ubicacion;
        $bodega->idSucursal = $request->idSucursal;
        $bodega->save();
        return redirect()->route('bodegas.index')->with('success','Bodega creada satisfactoriamente');
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
    public function edit($idBodega)
    {
        $bodega = Bodega::find($idBodega);
        $sucursales = Sucursal::all();
        return view('Bodega.edit',compact('bodega','sucursales'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idBodega)
    {
        $this->validate($request,[ 'localidad'=>'required', 'nombreBodega'=>'required']);
        $Bodega = Bodega::find($idBodega);
        $bodega->nombreBodega = $request->nombreBodega;
        $bodega->tipoBodega = $request->tipoBodega;
        $bodega->capacidad = $request->capacidad;
        $bodega->codigoOrden = $request->codigoOrden;
        $bodega->ubicacion = $request->ubicacion;
        $bodega->idSucursal = $request->idSucursal;
        $Bodega->save();
        return redirect()->route('bodega.index')->with('success','Bodega actualizada satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bodega::find($id)->delete();
        return redirect()->route('bodegas.index')->with('success','Bodega eliminada correctamente');
    }
}
