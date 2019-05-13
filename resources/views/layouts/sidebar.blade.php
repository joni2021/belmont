<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">

        <div class="pcoded-navigatio-lavel">Gestión</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu ">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-list"></i></span>
                    <span class="pcoded-mtext">Clientes</span>
                </a>
                <ul class="pcoded-submenu">
                    <li>
                        <a href="{{ route('clientes.create') }}">
                            <span class="pcoded-mtext">Nuevo cliente</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('clientes.index') }}">
                            <span class="pcoded-mtext">Ver clientes</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="pcoded-hasmenu ">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-list"></i></span>
                    <span class="pcoded-mtext">Préstamos</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="{{ route('formularios.create') }}">
                            <span class="pcoded-mtext">Nuevo préstamo</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('formularios.index') }}">
                            <span class="pcoded-mtext">Mis préstamos pendientes</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('formularios.index') }}">
                            <span class="pcoded-mtext">Mis préstamos otorgados</span>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>

    </div>
</nav>