<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
    <div class="profile-sidebar">
        <div class="widget-profile pro-widget-content">
            <div class="profile-info-widget">
                <a href="#" class="booking-doc-img">
                    <img src="{{ asset('assets/img/patients/patient.jpg') }}" alt="User Image">
                </a>
                <div class="profile-det-info">
                    <h3>{{ optional(Auth::user())->nome }} {{ optional(Auth::user())->sobrenome }}</h3>
                    <div class="patient-details">
                        <h5><i class="fas fa-birthday-cake"></i> {{ optional(Auth::user())->nascimento }}, 24 anos</h5>
                        <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Maputo, Moz</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-widget">
            <nav class="dashboard-menu">
                <ul>
                    <li class="active">
                        <a href="{{ route('resultados.index') }}">
                            <i class="fas fa-columns"></i>
                            <span>Painel Avaliativo</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-comments"></i>
                            <span>Mensagem</span>
                            <small class="unread-msg">23</small>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-user-cog"></i>
                            <span>Definiçoes de Perfil </span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

    </div>
</div>