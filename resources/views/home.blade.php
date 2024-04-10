@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Inicio</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-4 col-xl-4">

                                    <div class="card bg-c-pink order-card">
                                        <div class="card-block">
                                            <a href="/users" class="text-white">
                                                <h5>Usuarios con acceso al Panel</h5>
                                            </a>

                                            @php
                                                use App\Models\User;
                                                $cant_usuarios = User::count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fa fa-users f-left"></i><span>{{ $cant_usuarios }}</span></h2>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">

                                    <div class="card bg-c-blue order-card">
                                        <div class="card-block">
                                            <a href="/usuarios" class="text-white">
                                                <h5>Usuarios </h5>
                                            </a>
                                            @php
                                                use App\Models\Usuarios;
                                                $cant_usuarios = Usuarios::count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fa fa-users f-left"></i><span>{{ $cant_usuarios }}</span></h2>


                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                            <a href="/roles" class="text-white">
                                                <h5>Roles</h5>
                                            </a>
                                            @php
                                                use Spatie\Permission\Models\Role;
                                                $cant_roles = Role::count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fa fa-user-lock f-left"></i><span>{{ $cant_roles }}</span></h2>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-pink order-card">
                                        <div class="card-block">
                                            <a href="/paises" class="text-white">
                                                <h5>Paises</h5>
                                            </a>
                                            @php
                                                use App\Models\Paises;
                                                $cant_paises = Paises::count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fas fa-solid fa-globe f-left"></i><span>{{ $cant_paises }}</span>
                                            </h2>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-blue order-card">
                                        <div class="card-block">
                                            <a href="/roles" class="text-white">
                                                <h5>Ciudades</h5>
                                            </a>

                                            @php
                                                use App\Models\Ciudades;
                                                $cant_ciudades = Ciudades::count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fas fa-solid fa-city f-left"></i><span>{{ $cant_ciudades }}</span>
                                            </h2>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                            <a href="/transportes" class="text-white">
                                                <h5>Transportes</h5>
                                            </a>
                                            @php
                                                use App\Models\Transportes;
                                                $cant_transportes = Transportes::count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fas fa-solid fa-car f-left"></i><span>{{ $cant_transportes }}</span>
                                            </h2>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-pink order-card">
                                        <div class="card-block">
                                            <a href="/estados_viaje" class="text-white">
                                                <h5>Estados de Viaje</h5>
                                            </a>

                                            @php
                                                use App\Models\Estados_viaje;
                                                $cant_estados_viaje = Estados_viaje::count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fas fa-solid fa-plane-departure f-left"></i><span>{{ $cant_estados_viaje }}</span>
                                            </h2>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-blue order-card">
                                        <div class="card-block">
                                            <a href="/notificaciones" class="text-white">
                                                <h5>Notificaciones</h5>
                                            </a>
                                            @php
                                                use App\Models\Notificaciones;
                                                $cant_notificaciones = Notificaciones::count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fas fa-solid fa-envelope f-left"></i><span>{{ $cant_notificaciones }}</span>
                                            </h2>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                            <a href="/valoraciones" class="text-white">
                                                <h5>Valoraciones</h5>
                                            </a>
                                            @php
                                                use App\Models\Valoraciones;
                                                $cant_valoraciones = Valoraciones::count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fas fa-solid fa-star f-left"></i><span>{{ $cant_valoraciones }}</span>
                                            </h2>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-pink order-card">
                                        <div class="card-block">
                                            <a href="/albumes" class="text-white">
                                                <h5>Albumes</h5>
                                            </a>
                                            @php
                                                use App\Models\Albumes;
                                                $cant_albumes = Albumes::count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fas fa-solid fa-book f-left"></i><span>{{ $cant_albumes }}</span>
                                            </h2>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-blue order-card">
                                        <div class="card-block">
                                            <a href="/viajes" class="text-white">
                                                <h5>Viajes</h5>
                                            </a>
                                            @php
                                                use App\Models\Viajes;
                                                $cant_viajes = Viajes::count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fas fa-solid fa-route f-left"></i><span>{{ $cant_viajes }}</span>
                                            </h2>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                            <a href="/posts" class="text-white">
                                                <h5>Posts</h5>
                                            </a>

                                            @php
                                                use App\Models\Posts;
                                                $cant_posts = Posts::count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fas fa-solid fa-paste f-left"></i><span>{{ $cant_posts }}</span>
                                            </h2>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-pink order-card">
                                        <div class="card-block">
                                            <a href="/comentarios" class="text-white">
                                                <h5>Comentarios</h5>
                                            </a>
                                            @php
                                                use App\Models\Comentarios;
                                                $cant_comentarios = Comentarios::count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fas fa-solid fa-comment f-left"></i><span>{{ $cant_comentarios }}</span>
                                            </h2>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-blue order-card">
                                        <div class="card-block">
                                            <a href="/imagenes" class="text-white">
                                                <h5>Imagenes</h5>
                                            </a>
                                            @php
                                                use App\Models\Imagenes;
                                                $cant_imagenes = Imagenes::count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fas fa-solid fa-camera f-left"></i><span>{{ $cant_imagenes }}</span>
                                            </h2>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                            <a href="/amistades" class="text-white">
                                                <h5>Amistades</h5>
                                            </a>

                                            @php
                                                use App\Models\Amistades;
                                                $cant_amistades = Amistades::count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fas fa-solid fa-people-arrows f-left"></i><span>{{ $cant_amistades }}</span>
                                            </h2>

                                        </div>
                                    </div>
                                </div>


                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
