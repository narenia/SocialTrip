@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Estados viaje</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-estado_viaje')
                                <a class="btn btn-warning" href="{{ route('estados_viaje.create') }}">Crear</a>
                            @endcan
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef";>
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff">Nombre</th>
                                </thead>
                                <tbody>
                                    @foreach ($estados_viaje as $estado_viaje)
                                        <tr>
                                            <td style="display:none;">{{ $estado_viaje->id }}</td>
                                            <td>{{ $estado_viaje->nombre }}</td>

                                            <td>
                                                <form action="{{ route('estados_viaje.destroy', $estado_viaje->id) }}" method="POST">
                                                    @can('editar-estado_viaje')
                                                        <a class="btn btn-info"
                                                            href="{{ route('estados_viaje.edit', $estado_viaje->id) }}">Editar</a>
                                                    @endcan

                                                    @csrf
                                                    @method('DELETE')
                                                    @can('borrar-estado_viaje')
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
                        {!! $estados_viaje->links() !!}
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
