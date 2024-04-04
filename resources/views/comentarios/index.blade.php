@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Comentarios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-comentario')
                                <a class="btn btn-warning" href="{{ route('comentarios.create') }}">Crear</a>
                            @endcan
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef";>
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff">Usuario</th>
                                    <th style="color:#fff">Post</th>
                                    <th style="color:#fff">Contenido</th>
                                    <th style="color:#fff">Fecha de publicación</th>
                                </thead>
                                <tbody>
                                    @foreach ($comentarios as $comentario)
                                        <tr>
                                            <td style="display:none;">{{ $comentario->id }}</td>
                                            <td>{{ $comentario->usuarioId->nombre }}</td>
                                            <td>{{ $comentario->postId->titulo}}</td>
                                            <td>{{ $comentario->contenido }}</td>
                                            <td>{{ $comentario->created_at }}</td>

                                            <td>
                                                <form action="{{ route('comentarios.destroy', $comentario->id) }}"
                                                    method="POST">
                                                    @can('editar-comentario')
                                                        <a class="btn btn-info"
                                                            href="{{ route('comentarios.edit', $comentario->id) }}">Editar</a>
                                                    @endcan

                                                    @csrf
                                                    @method('DELETE')
                                                    @can('borrar-comentario')
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
                        {!! $comentarios->links() !!}
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
