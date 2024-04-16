@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear valoración</h3>
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
                            <form action="{{ route('valoraciones.store') }}" method="POST">
                                @csrf

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="viaje_id">Viaje</label>
                                        <select name="viaje_id" class="form-control">
                                            @foreach ($viajes as $viaje)
                                                <option value="{{ $viaje->id }}">{{ $viaje->id }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="puntuacion">Puntuación</label>
                                                <input type="int" name="puntuacion" class="form-control" min="1" max="10">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="valoracion">Valoracion</label>
                                                <input type="text" name="valoracion" class="form-control">
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
