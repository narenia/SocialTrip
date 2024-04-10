@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar usuario</h3>
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

                            {!! Form::model($usuario, ['method' => 'PATCH', 'route' => ['usuarios.update', $usuario->id]]) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="nombre_usuario">Nombre de usuario</label>
                                        {!! Form::text('nombre_usuario', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="apellidos">Apellidos</label>
                                        {!! Form::text('apellidos', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="dni">DNI</label>
                                        {!! Form::text('dni', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                                        {!! Form::date('fecha_nacimiento', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="contrasenna">Contraseña</label>
                                        {!! Form::password('contrasenna', ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="ciudad_residencia">Ciudad de residencia</label>
                                        <select name="ciudad_residencia" class="form-control">
                                            @foreach ($ciudades as $ciudad)
                                                <option value="{{ $ciudad->id }}" {{ $usuario->ciudad_residencia == $ciudad->id ? 'selected' : '' }}>
                                                    {{ $ciudad->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="ciudad_nacimiento">Ciudad de Nacimiento</label>
                                        <select name="ciudad_nacimiento" class="form-control">
                                            @foreach ($ciudades as $ciudad)
                                                <option value="{{ $ciudad->id }}" {{ $usuario->ciudad_nacimiento == $ciudad->id ? 'selected' : '' }}>{{ $ciudad->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>



                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
