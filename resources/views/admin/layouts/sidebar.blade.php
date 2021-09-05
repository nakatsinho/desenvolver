<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Principal</span>
                </li>
                <li class="{{ 'admin' == request()->path() ? 'active' : '' }}">
                    <a href="{{ route('admin.home') }}"><i class="fe fe-home"></i> <span>Painel de Controle</span></a>
                </li>
                <!-- <li>
                    <a href="#"><i class="fe fe-layout"></i> <span>Apontamentos</span></a>
                </li> -->
                <li class="{{ 'admin/cursos' == request()->path() ? 'active' : '' }}">
                    <a href="{{ route('admin.cursos.index') }}"><i class="fe fe-users"></i> <span>Cursos</span></a>
                </li>
                <li class="{{ 'admin/tutoria' == request()->path() ? 'active' : '' }}">
                    <a href="{{ route('admin.tutoria.index') }}"><i class="fe fe-user-plus"></i> <span>Linkar Modulo</span></a>
                </li>
                <li class="{{ 'admin/estudante' == request()->path() ? 'active' : '' }}">
                    <a href="{{ route('admin.estudante.index') }}"><i class="fe fe-user"></i> <span>Estudantes</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Relatorios</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="#">Limpo</a></li>
                    </ul>
                </li>
                <li class="menu-title">
                    <span>Sobre Mim</span>
                </li>
                <li class="{{ 'admin/perfil' == request()->path() ? 'active' : '' }}">
                    <a href="{{ route('admin.perfil.index') }}"><i class="fe fe-user-plus "></i> <span>Perfil</span></a>
                </li>
                <li class="submenu {{ 'admin/ficha/create' == request()->path() ? 'active' : '' }}">
                    <a href="#"><i class="fe fe-document"></i> <span> Material de Apoio </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('admin.ficha.create') }}"> Lançamento </a></li>
                    </ul>
                </li>
                <li class="menu-title">
                    <span>Extras</span>
                </li>
                <!-- <li>
                    <a href="components.html"><i class="fe fe-vector"></i> <span>Components</span></a>
                </li> -->
                <li class="submenu">
                    <a href="#"><i class="fe fe-layout"></i> <span> Parametros </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="#">Basic Inputs </a></li>
                    </ul>
                </li>
                <li class="submenu ">
                    <a href="#"><i class="fe fe-table"></i> <span> Tabelas </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="{{ 'admin/ficha' == request()->path() ? 'active' : '' }}"><a href="{{ route('admin.ficha.index') }}">Fichas & Material </a></li>
                        <li><a href="#">Data Table </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>