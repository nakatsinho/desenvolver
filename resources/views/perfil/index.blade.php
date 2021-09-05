@extends('layouts.app')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Painel de Controle</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Painel de Controle</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            @include('perfil.navbar')

            <div class="col-md-7 col-lg-8 col-xl-9">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card dash-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-4">
                                        <div class="dash-widget dct-border-rht">
                                            <div class="circle-bar circle-bar1">
                                                <div class="circle-graph1" data-percent="75">
                                                    <img src="assets/img/icon-01.png" class="img-fluid" alt="patient">
                                                </div>
                                            </div>
                                            <div class="dash-widget-info">
                                                <h6>Total Cursos</h6>
                                                <h3>{{ $todos->count() }}</h3>
                                                <p class="text-muted">Ate Hoje</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-4">
                                        <div class="dash-widget dct-border-rht">
                                            <div class="circle-bar circle-bar2">
                                                <div class="circle-graph2" data-percent="65">
                                                    <img src="assets/img/icon-02.png" class="img-fluid" alt="Patient">
                                                </div>
                                            </div>
                                            <div class="dash-widget-info">
                                                <h6>Cursos Pagos</h6>
                                                <h3>{{ $cursos->count() }}</h3>
                                                <p class="text-muted">Ate Hoje</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-4">
                                        <div class="dash-widget">
                                            <div class="circle-bar circle-bar3">
                                                <div class="circle-graph3" data-percent="50">
                                                    <img src="assets/img/icon-03.png" class="img-fluid" alt="Patient">
                                                </div>
                                            </div>
                                            <div class="dash-widget-info">
                                                <h6>Comentarios</h6>
                                                <h3>85</h3>
                                                <p class="text-muted">Todos</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h4 class="mb-4">Cronologia dos Cursos</h4>
                        <div class="appointment-tab">

                            <!-- Appointment Tab -->
                            <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#upcoming-appointments" data-toggle="tab">Recentes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#today-appointments" data-toggle="tab">Antigos</a>
                                </li>
                            </ul>
                            <!-- /Appointment Tab -->

                            <div class="tab-content">

                                <!-- Upcoming Appointment Tab -->
                                <div class="tab-pane show active" id="upcoming-appointments">
                                    <div class="card card-table mb-0">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Factura Nr.</th>
                                                            <th>Nome do Curso</th>
                                                            <th>Valor</th>
                                                            <th>Pago a</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($recents as $recent)
                                                        <tr>
                                                            <td>
                                                                <a href="{{ route('pedidos.show',$recent->id) }}">#FAC-AD{{ $recent->id }}</a>
                                                            </td>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="{{ route('pedidos.show',$recent->id) }}" class="avatar avatar-sm mr-2">
                                                                        <img class="avatar-img rounded-circle" src="{{ url('assets/img/patients/',$recent->foto) }}" alt="#">
                                                                    </a>
                                                                    <a href="{{ route('pedidos.show',$recent->id) }}">{{ $recent->curso_titulo }} <span>#{{ $recent->transaction_id }}</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>MZN {{ $recent->preco }}</td>
                                                            <td>{{ $recent->created_at }}</td>
                                                            <td class="text-right">
                                                                <div class="table-action">
                                                                    <a href="{{ route('pedidos.show',$recent->id) }}" class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> Ver
                                                                    </a>
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                                        <i class="fas fa-print"></i> Imprimir
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Upcoming Appointment Tab -->

                                <!-- Today Appointment Tab -->
                                <div class="tab-pane" id="today-appointments">
                                    <div class="card card-table mb-0">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Factura Nr.</th>
                                                            <th>Nome do Curso</th>
                                                            <th>Valor</th>
                                                            <th>Pago a</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($antigos as $recent)
                                                        <tr>
                                                            <td>
                                                                <a href="{{ route('pedidos.show',$recent->id) }}">#FAC-AD{{ $recent->id }}</a>
                                                            </td>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="{{ route('pedidos.show',$recent->id) }}" class="avatar avatar-sm mr-2">
                                                                        <img class="avatar-img rounded-circle" src="{{ url('assets/img/patients/',$recent->foto) }}" alt="#">
                                                                    </a>
                                                                    <a href="{{ route('pedidos.show',$recent->id) }}">{{ $recent->curso_titulo }} <span>#{{ $recent->transaction_id }}</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>MZN {{ $recent->preco }}</td>
                                                            <td>{{ $recent->created_at }}</td>
                                                            <td class="text-right">
                                                                <div class="table-action">
                                                                    <a href="{{ route('pedidos.show',$recent->id) }}" class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> Ver
                                                                    </a>
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                                        <i class="fas fa-print"></i> Imprimir
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Today Appointment Tab -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Page Content -->
@endsection