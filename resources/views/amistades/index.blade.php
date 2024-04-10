@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Amistades</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-amistad')
                                <a class="btn btn-warning" href="{{ route('amistades.create') }}">Crear</a>
                            @endcan
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef";>
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff">Usuario 1</th>
                                    <th style="color:#fff">Usuario 2</th>
                                    <th style="color:#fff">Estado</th>
                                </thead>
                                <tbody>
                                    @foreach ($amistades as $amistad)
                                        <tr>
                                            <td style="display:none;">{{ $amistad->id }}</td>
                                            <td>{{ $amistad->usuario1Id->nombre }}</td>
                                            <td>{{ $amistad->usuario2Id->nombre }}</td>
                                            <td>{{ $amistad->estado}}</td>



                                            <td>
                                                <form action="{{ route('amistades.destroy', $amistad->id) }}" method="POST">
                                                    @can('editar-amistad')
                                                        <a class="btn btn-info"
                                                            href="{{ route('amistades.edit', $amistad->id) }}">Editar</a>
                                                    @endcan

                                                    @csrf
                                                    @method('DELETE')
                                                    @can('borrar-amistad')
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
                        {!! $amistades->links() !!}
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
