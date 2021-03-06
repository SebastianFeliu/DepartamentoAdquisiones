@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro Producto') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('productos.store') }}" aria-label="{{ __('Registro de Producto') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="nombreProducto" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Producto') }}</label>

                            <div class="col-md-6">
                                <input id="nombreProducto" type="text" class="form-control{{ $errors->has('nombreProducto') ? ' is-invalid' : '' }}" name="nombreProducto" value="{{ old('nombreProducto') }}" required>

                                @if ($errors->has('nombreProducto'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombreProducto') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="tipoProducto" class="col-md-4 col-form-label text-md-right">{{ __('Tipo Producto') }}</label>

                                <div class="col-md-6">
                                    <input id="tipoProducto" type="text" class="form-control{{ $errors->has('tipoProducto') ? ' is-invalid' : '' }}" name="tipoProducto" value="{{ old('tipoProducto') }}" required>

                                    @if ($errors->has('tipoProducto'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('tipoProducto') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label for="fechaVencimiento" class="col-md-4 col-form-label text-md-right">{{ __('fechaVencimiento') }}</label>

                                    <div class="col-md-6">
                                        <input id="fechaVencimiento" type="date" class="form-control{{ $errors->has('fechaVencimiento') ? ' is-invalid' : '' }}" name="fechaVencimiento" value="{{ old('fechaVencimiento') }}" required>

                                        @if ($errors->has('fechaVencimiento'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('fechaVencimiento') }}</strong>
                                            </span>
                                        @endif
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
