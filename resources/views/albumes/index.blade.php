@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Álbumes</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-album')
                                <a class="btn btn-warning" href="{{ route('albumes.create') }}">Crear</a>
                            @endcan
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef";>
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff">Nombre</th>
                                    <th style="color:#fff">Usuario</th>
                                </thead>
                                <tbody>
                                    @foreach ($albumes as $album)
                                        <tr>
                                            <td style="display:none;">{{ $album->id }}</td>
                                            <td>{{ $album->nombre }}</td>
                                            <td>{{ $album->usuarioId->nombre }}</td>

                                            <td>
                                                <form action="{{ route('albumes.destroy', $album->id) }}" method="POST">
                                                    @can('editar-album')
                                                        <a class="btn btn-info"
                                                            href="{{ route('albumes.edit', $album->id) }}">Editar</a>
                                                    @endcan

                                                    @csrf
                                                    @method('DELETE')
                                                    @can('borrar-album')
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
                        {!! $albumes->links() !!}
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
