@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Sucursal') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('sucursales.update',$sucursal->idSucursal) }}" aria-label="{{ __('Editar Sucursal') }}">
                    <input name="_method" type="hidden" value="PATCH">
                        @csrf
                        <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Direccion') }}</label>

                            <div class="col-md-6">
                                <input id="direccion" type="text" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" value="{{$sucursal->direccion}}" name="direccion" value="{{ old('direccion') }}" required>

                                @if ($errors->has('direccion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nombreSucursal" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Sucursal') }}</label>

                            <div class="col-md-6">
                                <input id="nombreSucursal" type="text" class="form-control{{ $errors->has('nombreSucursal') ? ' is-invalid' : '' }}" value="{{$sucursal->nombreSucursal}}"name="nombreSucursal" value="{{ old('nombreSucursal') }}" required>

                                @if ($errors->has('nombreSucursal'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombreSucursal') }}</strong>
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
