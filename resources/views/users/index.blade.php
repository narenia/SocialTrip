@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Usuarios del panel</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-warning" href="{{ route('users.create') }}">Crear</a>
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef";>
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff">Nombre</th>
                                    <th style="color:#fff">E-mail</th>
                                    <th style="color:#fff">Rol</th>
                                    <th style="color:#fff">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td style="display:none;">{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if (!empty($user->getRoleNames()))
                                                    @foreach ($user->getRoleNames() as $rolName)
                                                        <h5><span class="badge badge-dark">{{ $rolName }} </span></h5>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-info"
                                                    href="{{ route('users.edit', $user->id) }}">Editar</a>

                                                {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['users.destroy', $user->id],
                                                    'style' => 'display:inline',
                                                ]) !!}
                                                {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div class="pagination justify-content-end">
                        {!! $users->links() !!}
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
