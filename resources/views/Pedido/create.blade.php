@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro Pedido') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('pedidos.store') }}" aria-label="{{ __('Registro de pedido') }}">
                        @csrf
                        <div class="form-group row">
                                <label for="fecha_pedido" class="col-md-4 col-form-label text-md-right">{{ __('Fecha pedido') }}</label>

                                <div class="col-md-6">
                                    <input id="fecha_pedido" type="date" class="form-control{{ $errors->has('fecha_pedido') ? ' is-invalid' : '' }}" name="fecha_pedido" value="{{ old('fecha_pedido') }}" required>

                                    @if ($errors->has('fecha_pedido'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('fecha_pedido') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        <div class="form-group row">
                            <label for="fecha_entrega" class="col-md-4 col-form-label text-md-right">{{ __('Fecha entrega') }}</label>

                            <div class="col-md-6">
                                <input id="fecha_entrega" type="date" class="form-control{{ $errors->has('fecha_entrega') ? ' is-invalid' : '' }}" name="fecha_entrega" value="{{ old('fecha_entrega') }}" required>

                                @if ($errors->has('fecha_entrega'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fecha_entrega') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="idBodega" class="col-md-4 col-form-label text-md-right">{{ __('Bodega') }}</label>
                                <div class="col-md-6">
                                <select class="form-control" id="idBodega" name="idBodega" required>
                                <option>Seleccione</option>
                                @foreach ($bodegas as $bodega)
                                <option value= "{{$bodega['idBodega']}}">{{$bodega['nombreBodega']}}</option>
                                @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label for="idProveedor" class="col-md-4 col-form-label text-md-right">{{ __('Proveedor') }}</label>
                                    <div class="col-md-6">
                                    <select class="form-control" id="idProveedor" name="idProveedor" required>
                                    <option>Seleccione</option>
                                    @foreach ($proveedores as $proveedor)
                                    <option value= "{{$proveedor['idProveedor']}}">{{$proveedor['nombreProveedor']}}</option>
                                    @endforeach
                                    </select>
                                    </div>
                                </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
