<li class="side-menus {{ Request::is('home') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        <i class=" fas fa-building"></i><span>Inicio</span>
    </a>

    <a class="nav-link" href="/usuarios">
        <i class=" fas fa-users"></i><span>Usuarios</span>
    </a>

    <a class="nav-link" href="/roles">
        <i class=" fas fa-user-lock"></i><span>Roles</span>
    </a>

    <a class="nav-link" href="/blogs">
        <i class=" fas fa-blog"></i><span>Posts</span>
    </a>
{{-- IMPLEMENTAR TODO LO DE ABAJO --}}
    {{-- <a class="nav-link" href="/albumes">
        <i class=" fas fa-solid fa-images"></i><span>Álbumes</span>
    </a> --}}

    <a class="nav-link" href="/paises">
        <i class=" fas fa-solid fa-globe"></i><span>Paises</span>
    </a>

    <a class="nav-link" href="/ciudades">
        <i class=" fas fa-solid fa-city"></i><span>Ciudades</span>
    </a>

    <a class="nav-link" href="/transportes">
        <i class="fas fa-solid fa-car"></i><span>Transporte</span>
    </a>
    <a class="nav-link" href="/estado-viaje">
        <i class=" fas fa-solid fa-plane-departure"></i><span>Estados viaje</span>
    </a>
</li>
