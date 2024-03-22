@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Paises</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-transporte')
                                <a class="btn btn-warning" href="{{ route('paises.create') }}">Nuevo</a>
                            @endcan
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef";>
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff">Nombre</th>
                                </thead>
                                <tbody>
                                    @foreach ($paises as $pais)
                                        <tr>
                                            <td style="display:none;">{{ $pais->id }}</td>
                                            <td>{{ $pais->nombre }}</td>

                                            <td>
                                                <form action="{{ route('paises.destroy', $pais->id) }}" method="POST">
                                                    @can('editar-pais')
                                                        <a class="btn btn-info"
                                                            href="{{ route('paises.edit', $pais->id) }}">Editar</a>
                                                    @endcan

                                                    @csrf
                                                    @method('DELETE')
                                                    @can('borrar-pais')
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
                        {!! $paises->links() !!}
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
