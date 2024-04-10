@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar viaje</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>Revise los campos!</strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{ $error }}
                                        </span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form action="{{ route('viajes.update', $viaje->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="usuario_id">Usuario</label>
                                        <select name="usuario_id" class="form-control">
                                            @foreach ($usuarios as $usuario)
                                                <option value="{{ $usuario->id }}" {{ $usuario->id == $viaje->usuario_id ? 'selected' : '' }}>{{ $usuario->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="fecha_inicio">Fecha De inicio</label>
                                        <input type="date" name="fecha_inicio" class="form-control" value="{{ $viaje->fecha_inicio }}">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="fecha_final">Fecha Final</label>
                                        <input type="date" name="fecha_final" class="form-control" value="{{ $viaje->fecha_final }}">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="transporte_id">Transporte</label>
                                        <select name="transporte_id" class="form-control">
                                            @foreach ($transportes as $transporte)
                                                <option value="{{ $transporte->id }}"  {{ $transporte->id == $viaje->transporte_id ? 'selected' : '' }}>{{ $transporte->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="ciudad_salida_id">Ciudad salida</label>
                                        <select name="ciudad_salida_id" class="form-control">
                                            @foreach ($ciudades as $ciudad)
                                                <option value="{{ $ciudad->id }}"  {{ $ciudad->id == $viaje->ciudad_salida_id ? 'selected' : '' }}>{{ $ciudad->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="ciudad_destino_id">Ciudad destino</label>
                                        <select name="ciudad_destino_id" class="form-control">
                                            @foreach ($ciudades as $ciudad)
                                                <option value="{{ $ciudad->id }}"{{ $ciudad->id == $viaje->ciudad_destino_id ? 'selected' : '' }}>{{ $ciudad->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="estados_viajes_id">Estado viaje</label>
                                        <select name="estados_viajes_id" class="form-control">
                                            @foreach ($estados_viajes as $estado_viaje)
                                                <option value="{{ $estado_viaje->id }}" {{ $estado_viaje->id == $viaje->estados_viajes_id ? 'selected' : '' }}>{{ $estado_viaje->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="recomendado">Recomendado</label>
                                        <input type="text" name="recomendado" class="form-control" value="{{ $viaje->recomendado }}">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Guardar</button>

                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
