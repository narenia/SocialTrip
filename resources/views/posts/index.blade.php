@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Posts</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-post')
                                <a class="btn btn-warning" href="{{ route('posts.create') }}">Crear</a>
                            @endcan
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef";>
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff">Usuario</th>
                                    <th style="color:#fff">Viaje</th>
                                    <th style="color:#fff">Titulo</th>
                                    <th style="color:#fff">Contenido</th>
                                    <th style="color:#fff">Fecha de publicacion</th>
                                    <th style="color:#fff">Fecha de modificacion</th>


                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td style="display:none;">{{ $post->id }}</td>
                                            <td>{{ $post->usuarioId->nombre }}</td>
                                            <td>{{ $post->viajeId->id }}</td>
                                            <td>{{ $post->titulo }}</td>
                                            <td>{{ $post->contenido }}</td>
                                            <td>{{ $post->created_at }}</td>
                                            <td>{{ $post->updated_at }}</td>
                                            <td>
                                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                                    @can('editar-post')
                                                        <a class="btn btn-info"
                                                            href="{{ route('posts.edit', $post->id) }}">Editar</a>
                                                    @endcan

                                                    @csrf
                                                    @method('DELETE')
                                                    @can('borrar-post')
                                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                                    @endcan
                                                    @if ($errors->has('delete_error'))
                                                        <div class="alert alert-danger">
                                                            {{ $errors->first('delete_error') }}
                                                        </div>
                                                    @endif
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div class="pagination justify-content-end">
                        {!! $posts->links() !!}
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
