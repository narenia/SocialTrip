@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar amistad</h3>
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

                            <form action="{{ route('amistades.update', $amistad->id) }}" method="POST">


                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="usuario1_id">Usuario 1</label>
                                            <select name="usuario1_id" class="form-control">
                                                @foreach ($usuarios as $usuario)
                                                    <option value="{{ $usuario->id }}" {{ $usuario->id == $amistad->usuario1_id ? 'selected' : '' }}>{{ $usuario->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="usuario2_id">Usuario 2</label>
                                            <select name="usuario2_id" class="form-control">
                                                @foreach ($usuarios as $usuario)
                                                    <option value="{{ $usuario->id }}" {{ $usuario->id == $amistad->usuario2_id ? 'selected' : '' }}>{{ $usuario->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="estado">Estado</label>
                                            <select name="estado" class="form-control">
                                                    <option value="Pendiente" {{ $amistad->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                                                    <option value="Activa" {{ $amistad->estado == 'Activa' ? 'selected' : '' }}>Activa</option>
                                            </select>
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
