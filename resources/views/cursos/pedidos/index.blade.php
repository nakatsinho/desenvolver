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
                        <li class="breadcrumb-item active" aria-current="page">Facturas</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Facturas de Cursos Pagos</h2>
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
                <div class="card card-table">
                    <div class="card-body">

                        <!-- Invoice Table -->
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
                                    @foreach($pedidos as $value)
                                    <tr>
                                        <td>
                                            <a href="{{ route('pedidos.show',$value->id) }}">#FAC-AD{{ $value->id }}</a>
                                        </td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="{{ route('pedidos.show',$value->id) }}" class="avatar avatar-sm mr-2">
                                                    <img class="avatar-img rounded-circle" src="{{ url('assets/img/patients/',$value->foto) }}" alt="#">
                                                </a>
                                                <a href="{{ route('pedidos.show',$value->id) }}">{{ $value->curso_titulo }} <span>#{{ $value->transaction_id }}</span></a>
                                            </h2>
                                        </td>
                                        <td>MZN {{ $value->preco }}</td>
                                        <td>{{ $value->created_at }}</td>
                                        <td class="text-right">
                                            <div class="table-action">
                                                <a href="{{ route('pedidos.show',$value->id) }}" class="btn btn-sm bg-info-light">
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
                        <!-- /Invoice Table -->

                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /Page Content -->
@endsection