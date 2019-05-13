<div class="pcoded-container navbar-wrapper">

    <nav class="navbar header-navbar pcoded-header">
        <div class="navbar-wrapper">

            <div class="navbar-logo">
                <a class="mobile-menu" id="mobile-collapse">
                    <i class="feather icon-menu"></i>
                </a>
                <a class="text-center" href="{{ url('/') }}">
                    <h1 class="text-white belmont-title h5 pt-2 text-center">Belmont</h1>
                </a>
                <a class="mobile-options">
                    <i class="feather icon-more-horizontal"></i>
                </a>
            </div>

            <div class="navbar-container container-fluid">
                <ul class="nav-left">
                    <li class="header-search">
                        <div class="main-search morphsearch-search">
                            <div class="input-group">
                                <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                                <input type="text" class="form-control">
                                <span class="input-group-addon search-btn"><i
                                        class="feather icon-search"></i></span>
                            </div>
                        </div>
                    </li>

                </ul>
                <ul class="nav-right">

                    <li class="user-profile header-notification">
                        <div class="dropdown-primary dropdown">
                            <div class="dropdown-toggle" data-toggle="dropdown">
                                <img src="assets/images/avatar-4.jpg" class="img-radius"
                                     alt="User-Profile-Image">
                                <span>{{ Auth::user()->user }}</span>
                                <i class="feather icon-chevron-down"></i>
                            </div>
                            <ul class="show-notification profile-notification dropdown-menu"
                                data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                <li>
                                    <a href="#">
                                        <i class="feather icon-settings"></i> Configuraciones
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="feather icon-user"></i> Perfil
                                    </a>
                                </li>
                                <li>
                                    {{ Form::open(['route' => 'logout','method' => 'post','id' => 'logout']) }}
                                    <button class="btn btn-button p-0 bg-transparent">
                                        <i class="feather icon-log-out"></i> Salir
                                    </button>
                                    {{ Form::close() }}
                                </li>
                            </ul>

                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>