@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
  <section class="content">
    <div class="col-md-12 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista Proveedores</h3></div>
          @if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ action('ProveedorController@create') }}" class="btn btn-info" >Añadir Proveedor</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>ID</th>
               <th>Localidad</th>
               <th>Nombre Proveedor</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
             @if($proveedores->count())
              @foreach($proveedores as $proveedor)
              <tr>
                <td>{{$proveedor->idProveedor}}</td>
                <td>{{$proveedor->localidad}}</td>
                <td>{{$proveedor->nombreProveedor}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('ProveedorController@edit', $proveedor->idProveedor)}}" ><i class="far fa-edit"></i></a></td>
                <td>
                  <form action="{{action('ProveedorController@destroy', $proveedor->idProveedor)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><i class="fas fa-trash"></i></button>
                 </td>
               </tr>
               @endforeach
               @else
               <tr>
                <td colspan="8">No existen registros.</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>

@endsection
