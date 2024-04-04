@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Valoraciones</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-valoracion')
                                <a class="btn btn-warning" href="{{ route('valoraciones.create') }}">Crear</a>
                            @endcan
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef";>
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff">Viaje</th>
                                    <th style="color:#fff">Puntuacion</th>
                                    <th style="color:#fff">Valoracion</th>

                                </thead>
                                <tbody>
                                    @foreach ($valoraciones as $valoracion)
                                        <tr>
                                            <td style="display:none;">{{ $valoracion->id }}</td>
                                            <td>{{ $valoracion->viajeId->id }}</td>
                                            <td>{{ $valoracion->puntuacion }}</td>
                                            <td>{{ $valoracion->valoracion }}</td>


                                            <td>
                                                <form action="{{ route('valoraciones.destroy', $valoracion->id) }}"
                                                    method="POST">
                                                    @can('editar-valoracion')
                                                        <a class="btn btn-info"
                                                            href="{{ route('valoraciones.edit', $valoracion->id) }}">Editar</a>
                                                    @endcan

                                                    @csrf
                                                    @method('DELETE')
                                                    @can('borrar-valoracion')
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
                        {!! $valoraciones->links() !!}
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
