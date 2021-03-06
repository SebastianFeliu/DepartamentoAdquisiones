@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Proveedor') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('proveedores.update',$proveedor->idProveedor) }}" aria-label="{{ __('Editar Proveedor') }}">
                    <input name="_method" type="hidden" value="PATCH">
                        @csrf
                        <div class="form-group row">
                                <label for="localidad" class="col-md-4 col-form-label text-md-right">{{ __('Localidad') }}</label>

                                <div class="col-md-6">

                                    <input id="localidad" type="text" class="form-control{{ $errors->has('localidad') ? ' is-invalid' : '' }}" value="{{$proveedor->localidad}}"  name="localidad" value="{{ old('localidad') }}" required>

                                    @if ($errors->has('localidad'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('localidad') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nombreProveedor" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Proveedor') }}</label>

                                <div class="col-md-6">
                                    <input id="nombreProveedor" type="text" class="form-control{{ $errors->has('nombreProveedor') ? ' is-invalid' : '' }}" value="{{$proveedor->nombreProveedor}}" name="nombreProveedor" value="{{ old('nombreSucursal') }}" required>

                                    @if ($errors->has('nombreProveedor'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nombreProveedor') }}</strong>
                                        </span>
                                    @endif
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
