<li class="side-menus {{ Request::is('home') ? 'active' : '' }}">
    <a class="nav-link" href="/public/home">
        <i class=" fas fa-building"></i><span>Inicio</span>
    </a>


    @can('ver-user')
        <a class="nav-link" href="/public/users">
            <i class=" fas fa-users"></i><span>Usuarios Panel</span>
        </a>
    @endcan
    @can('ver-usuario')
        <a class="nav-link" href="/public/usuarios">
            <i class=" fas fa-users"></i><span>Usuarios</span>
        </a>
    @endcan

    @can('ver-rol')
        <a class="nav-link" href="/public/roles">
            <i class=" fas fa-user-lock"></i><span>Roles</span>
        </a>
    @endcan
    @can('ver-pais')
        <a class="nav-link" href="/public/paises">
            <i class=" fas fa-solid fa-globe"></i><span>Paises</span>
        </a>
    @endcan
    @can('ver-ciudad')
        <a class="nav-link" href="/public/ciudades">
            <i class=" fas fa-solid fa-city"></i><span>Ciudades</span>
        </a>
    @endcan
    @can('ver-transporte')
        <a class="nav-link" href="/public/transportes">
            <i class="fas fa-solid fa-car"></i><span>Transporte</span>
        </a>
    @endcan
    @can('ver-estado_viaje')
        <a class="nav-link" href="/public/estados_viaje">
            <i class=" fas fa-solid fa-plane-departure"></i><span>Estados viaje</span>
        </a>
    @endcan
    @can('ver-notificacion')
        <a class="nav-link" href="/public/notificaciones">
            <i class=" fas fa-solid fa-envelope"></i><span>Notificaciones</span>
        </a>
    @endcan
    @can('ver-valoracion')
        <a class="nav-link" href="/public/valoraciones">
            <i class=" fas fa-solid fa-star"></i><span>Valoraciones</span>
        </a>
    @endcan
    @can('ver-album')
        <a class="nav-link" href="/public/albumes">
            <i class=" fas fa-solid fa-book"></i><span>Albumes</span>
        </a>
    @endcan
    @can('ver-viaje')
        <a class="nav-link" href="/public/viajes">
            <i class=" fas fa-solid fa-route"></i><span>Viajes</span>
        </a>
    @endcan

    @can('ver-post')
        <a class="nav-link" href="/public/posts">
            <i class=" fas fa-solid fa-paste"></i><span>Posts</span>
        </a>
    @endcan

    @can('ver-comentario')
        <a class="nav-link" href="/public/comentarios">
            <i class=" fas fa-solid fa-comment"></i><span>Comentarios</span>
        </a>
    @endcan
    @can('ver-imagen')
        <a class="nav-link" href="/public/imagenes">
            <i class=" fas fa-solid fa-camera"></i><span>Imagenes</span>
        </a>
    @endcan

    @can('ver-amistad')
        <a class="nav-link" href="/public/amistades">
            <i class=" fas fa-solid fa-people-arrows"></i><span>Amistades</span>
        </a>
    @endcan
</li>
