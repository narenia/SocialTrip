@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar imagen</h3>
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

                            <form action="{{ route('imagenes.update', $imagen->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="imagen">Imagen</label>
                                        <input type="file" name="imagen" class="form-control-file">
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="album_id">Album</label>
                                        <select name="album_id" class="form-control">
                                            <option value="">Selecciona un álbum</option>
                                            @foreach ($albumes as $album)
                                                <option value="{{ $album->id }}" {{ $album->id == $imagen->album_id ? 'selected' : '' }}>{{ $album->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="posts_id">Post</label>
                                            <select name="posts_id" class="form-control">
                                                <option value="">Selecciona un post</option>
                                                @foreach ($posts as $post)
                                                    <option value="{{ $post->id }}" {{ $post->id == $imagen->posts_id ? 'selected' : '' }}>{{ $post->titulo }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="viajes_id">Viaje</label>
                                            <select name="viajes_id" class="form-control">
                                                <option value="">Selecciona un viaje</option>
                                                @foreach ($viajes as $viaje)
                                                    <option value="{{ $viaje->id }}" {{ $viaje->id == $imagen->viajes_id ? 'selected' : '' }}>{{ $viaje->id }}</option>
                                                @endforeach
                                            </select>
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
