@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar comentario</h3>
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

                            <form action="{{ route('comentarios.update', $comentario->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="usuarios_id">Usuario</label>
                                        <select name="usuarios_id" class="form-control">
                                            @foreach ($usuarios as $usuario)
                                                <option value="{{ $usuario->id }}"  {{ $usuario->id == $comentario->usuarios_id ? 'selected' : '' }}>{{ $usuario->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="post_id">Post</label>
                                        <select name="post_id" class="form-control">
                                            @foreach ($posts as $post)
                                                <option value="{{ $post->id }}"  {{ $post->id == $comentario->post_id ? 'selected' : '' }}>{{ $post->titulo }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="contenido">Contenido</label>
                                        <input type="text" name="contenido" class="form-control" value="{{ $comentario->contenido }}">
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
