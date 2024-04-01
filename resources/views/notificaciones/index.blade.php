@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Notificaciones</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-transporte')
                                <a class="btn btn-warning" href="{{ route('notificaciones.create') }}">Nuevo</a>
                            @endcan
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef";>
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff">Usuario</th>
                                    <th style="color:#fff">Tipo</th>
                                    <th style="color:#fff">Estado</th>
                                    <th style="color:#fff">Fecha</th>
                                    <th style="color:#fff">Contenido</th>

                                </thead>
                                <tbody>
                                    @foreach ($notificaciones as $notificacion)
                                        <tr>
                                            <td style="display:none;">{{ $notificacion->id }}</td>
                                            <td>{{ $notificacion->usuario_id }}</td>
                                            <td>{{ $notificacion->tipo }}</td>
                                            <td>{{ $notificacion->estado }}</td>
                                            <td>{{ $notificacion->fecha }}</td>
                                            <td>{{ $notificacion->contenido }}</td>


                                            <td>
                                                <form action="{{ route('notificaciones.destroy', $notificacion->id) }}"
                                                    method="POST">
                                                    @can('editar-notificacion')
                                                        <a class="btn btn-info"
                                                            href="{{ route('notificaciones.edit', $notificacion->id) }}">Editar</a>
                                                    @endcan

                                                    @csrf
                                                    @method('DELETE')
                                                    @can('borrar-notificacion')
                                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                                    @endcan
                                                    @if ($errors->has('delete_error'))
                                                        <div class="alert alert-danger">{{ $errors->first('delete_error') }}
                                                        </div>
                                                    @endif
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div class="pagination justify-content-end">
                        {!! $notificaciones->links() !!}
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
