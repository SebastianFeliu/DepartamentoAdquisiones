@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro Bodegas') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('bodegas.store') }}" aria-label="{{ __('Registro de Bodegas') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="nombreBodega" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Bodega') }}</label>

                            <div class="col-md-6">
                                <input id="nombreBodega" type="text" class="form-control{{ $errors->has('nombreBodega') ? ' is-invalid' : '' }}" name="nombreBodega" value="{{ old('nombreBodega') }}" required>

                                @if ($errors->has('nombreBodega'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombreBodega') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="tipoBodega" class="col-md-4 col-form-label text-md-right">{{ __('Tipo Bodega') }}</label>

                                <div class="col-md-6">
                                <select class="form-control" id="tipoBodega" name="tipoBodega" required>
                                <option>Seleccione</option>
                                <option value="Despachos">Despachos</option>
                                <option value="Rotacion Lenta">Rotacion Lenta</option>
                                <option value="Rotacion Rapida">Rotacion Rapida</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label for="capacidad" class="col-md-4 col-form-label text-md-right">{{ __('Capacidad (m³)') }}</label>

                                    <div class="col-md-6">
                                        <input id="capacidad" type="text" class="form-control{{ $errors->has('capacidad') ? ' is-invalid' : '' }}" name="capacidad" value="{{ old('capacidad') }}" required>

                                        @if ($errors->has('capacidad'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('capacidad') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label for="codigoOrden" class="col-md-4 col-form-label text-md-right">{{ __('Codigo Orden') }}</label>

                                        <div class="col-md-6">
                                            <input id="codigoOrden" type="text" class="form-control{{ $errors->has('codigoOrden') ? ' is-invalid' : '' }}" name="codigoOrden" value="{{ old('codigoOrden') }}" required>

                                            @if ($errors->has('codigoOrden'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('codigoOrden') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="ubicacion" class="col-md-4 col-form-label text-md-right">{{ __('Ubicacion') }}</label>

                                            <div class="col-md-6">
                                                <input id="ubicacion" type="text" class="form-control{{ $errors->has('ubicacion') ? ' is-invalid' : '' }}" name="ubicacion" value="{{ old('ubicacion') }}" required>

                                                @if ($errors->has('ubicacion'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('ubicacion') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="idSucursal" class="col-md-4 col-form-label text-md-right">{{ __('Sucursal') }}</label>
                                            <div class="col-md-6">
                                            <select class="form-control" id="idSucursal" name="idSucursal" required>
                                            <option>Seleccione</option>
                                            @foreach ($sucursales as $sucursal)
                                            <option value= "{{$sucursal['idSucursal']}}">{{$sucursal['nombreSucursal']}}</option>
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
