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
                        <a href="{{ route('clients.create') }}">
                            <span class="pcoded-mtext">Nuevo cliente</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('clients.index') }}">
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
                        <a href="{{ route('forms.create') }}">
                            <span class="pcoded-mtext">Nuevo préstamo</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('forms.index',0) }}">
                            <span class="pcoded-mtext">Préstamos otorgados</span>
                        </a>
                    </li>
                    {{--<li class="">--}}
                        {{--<a href="{{ route('forms.index',1) }}">--}}
                            {{--<span class="pcoded-mtext">Mis préstamos otorgados</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                </ul>
            </li>

        </ul>

    </div>
</nav>