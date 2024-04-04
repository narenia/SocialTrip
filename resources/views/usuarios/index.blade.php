@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Usuarios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-warning" href="{{ route('usuarios.create') }}">Crear</a>
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef";>
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff">Usuario</th>
                                    <th style="color:#fff">Nombre</th>
                                    <th style="color:#fff">Apellidos</th>
                                    <th style="color:#fff">E-mail</th>
                                    <th style="color:#fff">DNI</th>
                                    <th style="color:#fff">Ciudad de Residencia</th>
                                    <th style="color:#fff">Ciudad de Nacimiento</th>
                                    <th style="color:#fff">Fecha de Nacimiento</th>
                                    <th style="color:#fff">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $usuario)
                                        <tr>
                                            <td style="display:none;">{{ $usuario->id }}</td>
                                            <td>{{ $usuario->nombre_usuario }}</td>
                                            <td>{{ $usuario->nombre }}</td>
                                            <td>{{ $usuario->apellidos }}</td>
                                            <td>{{ $usuario->email }}</td>
                                            <td>{{ $usuario->dni }}</td>
                                            <td>{{ $usuario->ciudadResidencia->nombre }}</td>
                                            <td>{{ $usuario->ciudadNacimiento->nombre }}</td>
                                            <td>{{ $usuario->fecha_nacimiento }}</td>

                                            <td>
                                                <a class="btn btn-info"
                                                    href="{{ route('usuarios.edit', $usuario->id) }}">Editar</a>

                                                {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['usuarios.destroy', $usuario->id],
                                                    'style' => 'display:inline',
                                                ]) !!}
                                                {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div class="pagination justify-content-end">
                        {!! $usuarios->links() !!}
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
