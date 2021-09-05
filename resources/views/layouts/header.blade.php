<header class="header">
    <nav class="navbar navbar-expand-lg header-nav">
        <div class="navbar-header">
            <a id="mobile_btn" href="javascript:void(0);">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>
            <a href="/" class="navbar-brand logo">
                <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" alt="Logo">
            </a>
        </div>
        <div class="main-menu-wrapper">
            <div class="menu-header">
                <a href="/" class="menu-logo">
                    <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" alt="Logo">
                </a>
                <a id="menu_close" class="menu-close" href="javascript:void(0);">
                    <i class="fas fa-times"></i>
                </a>
            </div>
            <ul class="main-nav">
                <li class="active">
                    <a href="/home">Painel Inicial</a>
                </li>
                <li class="has-submenu">
                    <a href="{{ route('cursos.index') }}">Cursos</a>
                </li>
                <li class="has-submenu">
                    <a href="#">Certificaçao </a>
                </li>
                <li class="has-submenu active">
                    <a href="#">Nossa Info <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="#">Contacte-nos</a></li>
                        <li><a href="#">Quem Somos?</a></li>
                        <li class="has-submenu">
                            <a href="#">Notas</a>
                            <ul class="submenu">
                                <li><a href="#">Termos & Condiçoes</a></li>
                                <li><a href="#">Politicas</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Sobre a Plataforma</a></li>
                    </ul>
                </li>
                @guest
                <li class="login-link">
                    <a href="{{ route('login') }}">Entrar / Cadastrar</a>
                </li>
                @else
                <!-- User Menu -->
                <!-- <li class="nav-item dropdown has-arrow logged-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="{{ url('assets/img/users/',Auth::user()->foto) }}" width="31" alt="{{ Auth::user()->nome }} {{ Auth::user()->sobrenome }}">
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="user-header">
                            <div class="user-text">
                                <h6>{{ Auth::user()->nome }} {{ Auth::user()->sobrenome }}</h6>
                                <p class="text-muted mb-0">Estudante</p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="{{ route('perfil.index') }}"> Painel de Controle </a>
                        <a class="dropdown-item" href="{{ route('perfil.edit',Auth::user()->id) }}"> Definições de Perfil</a>
                        <a class="dropdown-item" href="{{ route('pedidos.index') }}"> Facturas Pagas</a>
                        <a class="dropdown-item" href="{{ url('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">Encerrar ou Sair</a>
                        <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li> -->
                <!-- /User Menu -->
                @endguest
            </ul>
        </div>
        <ul class="nav header-navbar-rht">
            <li class="nav-item contact-item">
                <div class="header-contact-img">
                    <i class="far fa-hospital"></i>
                </div>
                <div class="header-contact-detail">
                    <p class="contact-header">Contacto</p>
                    <p class="contact-info-header"> +258 84 524 8888</p>
                </div>
            </li>
            @guest
            <li class="nav-item">
                <a class="nav-link header-login" href="{{ route('login') }}">Entrar / Cadastrar </a>
            </li>
            @else
            <!-- User Menu -->
            <li class="nav-item dropdown has-arrow logged-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <span class="user-img">
                        <img class="rounded-circle" src="{{ url('adminn/assets/img/users/',Auth::user()->foto) }}" width="31" alt="{{ Auth::user()->nome }} {{ Auth::user()->sobrenome }}">
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="user-header">
                        <div class="avatar avatar-sm">
                            <img src="{{ url('adminn/assets/img/users/',Auth::user()->foto) }}" alt="User Image" class="avatar-img rounded-circle">
                        </div>
                        <div class="user-text">
                            <h6>{{ Auth::user()->nome }} {{ Auth::user()->sobrenome }}</h6>
                            <p class="text-muted mb-0">Estudante</p>
                        </div>
                    </div>
                    <a class="dropdown-item" href="{{ route('perfil.index') }}"> Painel de Controle </a>
                    <a class="dropdown-item" href="{{ route('perfil.edit',Auth::user()->id) }}"> Definições de Perfil</a>
                    <a class="dropdown-item" href="{{ route('pedidos.index') }}"> Facturas Pagas</a>
                    <a class="dropdown-item" href="{{ url('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">Encerrar ou Sair</a>
                    <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            <!-- /User Menu -->
            @endguest
        </ul>
    </nav>
</header>