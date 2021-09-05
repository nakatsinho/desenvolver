@extends('admin.layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Bem-Vindo Monitor!</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Painel de Controle</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon text-primary border-primary">
                                <i class="fe fe-users"></i>
                            </span>
                            <div class="dash-count">
                                <h3>{{$users->count()}}</h3>
                            </div>
                        </div>
                        <div class="dash-widget-info">
                            <h6 class="text-muted">Usuarios</h6>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-primary w-50"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon text-success">
                                <i class="fe fe-credit-card"></i>
                            </span>
                            <div class="dash-count">
                                <h3>{{$cursos->count()}}</h3>
                            </div>
                        </div>
                        <div class="dash-widget-info">

                            <h6 class="text-muted">Cursos</h6>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-success w-50"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon text-danger border-danger">
                                <i class="fe fe-pencil"></i>
                            </span>
                            <div class="dash-count">
                                <h3>{{$modulos->count()}}</h3>
                            </div>
                        </div>
                        <div class="dash-widget-info">

                            <h6 class="text-muted">Modulos</h6>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-danger w-50"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon text-warning border-warning">
                                <i class="fe fe-folder"></i>
                            </span>
                            <div class="dash-count">
                                <h3>{{$fichas->count()}}</h3>
                            </div>
                        </div>
                        <div class="dash-widget-info">

                            <h6 class="text-muted">Fichas de Apoio</h6>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-warning w-50"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <!-- Recent Orders -->
                <div class="card card-table">
                    <div class="card-header">
                        <h4 class="card-title">Cadastros Recentes</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Nome Estudante</th>
                                        <th>Data de Entrada</th>
                                        <th class="text-right">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($newUsers as $value)
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{url('adminn/assets/img/users/',$value->foto) }}" alt="User Image"></a>
                                                <a href="#">{{optional($value)->nome}}</a>
                                            </h2>
                                        </td>
                                        <td>{{$value->created_at}} <span class="text-primary d-block">11.00 AM - 11.15 AM</span></td>
                                        
                                        <td class="text-right">
                                            {{optional($value->status)->nome}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /Recent Orders -->

            </div>
        </div>
    </div>
</div>
@endsection