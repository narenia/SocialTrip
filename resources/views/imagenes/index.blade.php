@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">imagenes</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-imagen')
                                <a class="btn btn-warning" href="{{ route('imagenes.create') }}">Crear</a>
                            @endcan
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef";>
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff">Ruta</th>
                                    <th style="color:#fff">Album</th>
                                    <th style="color:#fff">Post</th>
                                    <th style="color:#fff">Viaje</th>
        

                                </thead>
                                <tbody>
                                    @foreach ($imagenes as $imagen)
                                        <tr>
                                            <td style="display:none;">{{ $imagen->id }}</td>
                                            <td>{{ $imagen->ruta }}</td>
                                            <td>{{ $imagen->albumId->nombre }}</td>
                                            <td>{{ $imagen->postId->nombre }}</td>
                                            <td>{{ $imagen->viajeId->nombre }}</td>


                                            <td>
                                                <form action="{{ route('imagenes.destroy', $imagen->id) }}"
                                                    method="POST">
                                                    @can('editar-imagen')
                                                        <a class="btn btn-info"
                                                            href="{{ route('imagenes.edit', $imagen->id) }}">Editar</a>
                                                    @endcan

                                                    @csrf
                                                    @method('DELETE')
                                                    @can('borrar-imagen')
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
                        {!! $imagenes->links() !!}
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
