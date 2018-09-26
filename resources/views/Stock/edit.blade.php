@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Stock') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('stock.update',$stock->idStock) }}" aria-label="{{ __('Editar Stock') }}">
                    <input name="_method" type="hidden" value="PATCH">
                        @csrf
                        <div class="form-group row">
                            <label for="idProducto" class="col-md-4 col-form-label text-md-right">{{ __('Producto') }}</label>
                            <div class="col-md-6">
                            <select class="form-control" id="idProducto" name="idProducto" required>
                            <option>Seleccione</option>
                            @foreach ($productos as $producto)
                            <option value= "{{$producto['idProducto']}}">{{$producto['nombreProducto']}}</option>
                            @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cantidad" class="col-md-4 col-form-label text-md-right">{{ __('Cantidad') }}</label>
                            <div class="col-md-6">
                            <input id="cantidad" type="text" class="form-control{{ $errors->has('cantidad') ? ' is-invalid' : '' }}" name="cantidad" value="{{$stock->cantidad}}" required>
                                @if ($errors->has('cantidad'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cantidad') }}</strong>
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
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Realizar Cambios') }}
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
