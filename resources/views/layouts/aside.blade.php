<!-- aside -->
<div class="column is-2">
    <aside class="menu">
        <p class="menu-label">General</p>
        <ul class="menu-list">
            <li>
                <a href="{{ url('vehiculos') }}">Vehiculos</a>
            </li>
            <li>
                <a href="{{ url('registros') }}">Registros</a>
            </li>
            <li>
                <a href="{{ url('actividades') }}">Actividades</a>
            </li>
        </ul>
        @admin
            <p class="menu-label">Administration</p>
            <ul class="menu-list">
                <li>
                    <a href="{{ url('usuarios') }}">Usuarios</a>
                </li>
            </ul>
        @endadmin
    </aside>
</div>
<!-- end aside -->
