@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Viajes</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-viaje')
                                <a class="btn btn-warning" href="{{ route('viajes.create') }}">Crear</a>
                            @endcan
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef";>
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff">Usuario</th>
                                    <th style="color:#fff">Fecha Inicio</th>
                                    <th style="color:#fff">Fecha Final</th>
                                    <th style="color:#fff">Transporte</th>
                                    <th style="color:#fff">Ciudad salida</th>
                                    <th style="color:#fff">Ciudad destino</th>
                                    <th style="color:#fff">Estado viaje</th>
                                    <th style="color:#fff">Recomendado</th>

                                </thead>
                                <tbody>
                                    @foreach ($viajes as $viaje)
                                        <tr>
                                            <td style="display:none;">{{ $viaje->id }}</td>
                                            <td>{{ $viaje->usuarioId->nombre }}</td>
                                            <td>{{ $viaje->fecha_inicio }}</td>
                                            <td>{{ $viaje->fecha_final }}</td>
                                            <td>{{ $viaje->transporteId->nombre }}</td>
                                            <td>{{ $viaje->ciudadSalidaId->nombre }}</td>
                                            <td>{{ $viaje->ciudadDestinoId->nombre }}</td>
                                            <td>{{ $viaje->estadoViajeId->nombre }}</td>
                                            <td>{{ $viaje->recomendado }}</td>


                                            <td>
                                                <form action="{{ route('viajes.destroy', $viaje->id) }}"
                                                    method="POST">
                                                    @can('editar-viaje')
                                                        <a class="btn btn-info"
                                                            href="{{ route('viajes.edit', $viaje->id) }}">Editar</a>
                                                    @endcan

                                                    @csrf
                                                    @method('DELETE')
                                                    @can('borrar-viaje')
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
                        {!! $viajes->links() !!}
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
