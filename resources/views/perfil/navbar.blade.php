<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
    <!-- Profile Sidebar -->
    <div class="profile-sidebar">
        <div class="widget-profile pro-widget-content">
            <div class="profile-info-widget">
                <a href="#" class="booking-doc-img">
                    <img src="{{ url('assets/img/users/',Auth::user()->foto) }}" alt="User Image">
                </a>
                <div class="profile-det-info">
                    <h3>{{ Auth::user()->nome }} {{ Auth::user()->sobrenome }}</h3>

                    <div class="patient-details">
                        <h5 class="mb-0">{{ Auth::user()->email }} | {{ Auth::user()->numero }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-widget">
            <nav class="dashboard-menu">
                <ul>
                    <li class="{{ 'perfil' == request()->path() ? 'active' : '' }}">
                        <a href="{{ route('perfil.index') }}">
                            <i class="fas fa-columns"></i>
                            <span>Painel de Controle</span>
                        </a>
                    </li>
                    <li class="{{ 'pedidos' == request()->path() ? 'active' : '' }}">
                        <a href="{{ route('pedidos.index') }}">
                            <i class="fas fa-file-invoice"></i>
                            <span>Historico Facturas</span>
                        </a>
                    </li>
                    <li class="{{ 'resultados' == request()->path() ? 'active' : '' }}">
                        <a href="{{ route('resultados.index') }}">
                            <i class="fas fa-book"></i>
                            <span>Meus Resultados</span>
                        </a>
                    </li>
                    <li class="{{ 'perfil/#/edit' == request()->path() ? 'active' : '' }}">
                        <a href="{{ route('perfil.edit',Auth::user()->id) }}">
                            <i class="fas fa-user-cog"></i>
                            <span>Definiçoes de Perfil</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-lock"></i>
                            <span>Mudar Senha</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> 
                        <span>Sair da Conta</span></a>
                        <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- /Profile Sidebar -->

</div>