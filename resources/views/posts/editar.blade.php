@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar post</h3>
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

                            <form action="{{ route('posts.update', $post->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="usuario_id">Usuario</label>
                                        <select name="usuario_id" class="form-control">
                                            @foreach ($usuarios as $usuario)
                                                <option value="{{ $usuario->id }}" {{ $usuario->id == $post->usuario_id ? 'selected' : '' }}>{{ $usuario->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="viajes_id">Viaje</label>
                                        <select name="viajes_id" class="form-control">
                                            @foreach ($viajes as $viaje)
                                                <option value="{{ $viaje->id }}" {{ $viaje->id == $post->viaje_id ? 'selected' : '' }}>{{ $viaje->id }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="titulo">Título</label>
                                        <input type="text" name="titulo" class="form-control"  value="{{ $post->titulo }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="contenido">Contenido</label>
                                        <input type="text" name="contenido" class="form-control"  value="{{ $post->contenido }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">

                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
