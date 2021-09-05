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
                        <li class="breadcrumb-item active" aria-current="page">Visualizar Factura</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Visualizar Factura</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="invoice-content">
                    <div class="invoice-item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-logo">
                                    <img src="{{ asset('assets/img/logo.png') }}" alt="logo">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="invoice-details">
                                    <strong>Processado:</strong> 20/07/2019 <br>
                                    <strong>Pedido nr. :</strong> #00124 <br>
                                    <strong>Estado:</strong> <span style="color:green">PAGO</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Invoice Item -->
                    <div class="invoice-item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-info">
                                    <strong class="customer-text">Factura Produzida Por:</strong>
                                    <p class="invoice-details invoice-details-two">
                                        Academia Desenvolver <br>
                                        Av. Amed Sekou Torre, 4154,<br>
                                        Maputo, MOZ <br>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="invoice-info invoice-info2">
                                    <strong class="customer-text">Factura Para:</strong>
                                    <p class="invoice-details">
                                        {{ $curso->nome_cliente }} <br>
                                        {{ $curso->local }}, {{ $curso->distrito }}, <br>
                                        {{ $curso->provincia }}, {{ $curso->zip }}, {{ $curso->pais }} <br>
                                        {{ $curso->user_email }} | {{ $curso->contacto }} <br>
                                        <a href="{{route('cursos.show',$curso->curso_id)}}" class="btn btn-success">Ir Para o Curso</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Item -->

                    <!-- Invoice Item -->
                    <div class="invoice-item">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="invoice-info">
                                    <strong class="customer-text">Metodo de Pagamento</strong>
                                    <p class="invoice-details invoice-details-two">
                                        M-Pesa <br>
                                        +258 84 524 8888 <br>
                                        Processado por Computador<br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Item -->

                    <!-- Invoice Item -->
                    <div class="invoice-item invoice-table-wrap">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="invoice-table table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Descriçao</th>
                                                <th class="text-center">Quant.</th>
                                                <th class="text-center">IVA</th>
                                                <th class="text-right">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $curso->nome }}</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">MZN 0</td>
                                                <td class="text-right">MZN {{ $curso->preco }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4 ml-auto">
                                <div class="table-responsive">
                                    <table class="invoice-table-two table">
                                        <tbody>
                                            <tr>
                                                <th>Subtotal:</th>
                                                <td><span>MZN {{ $curso->preco }}</span></td>
                                            </tr>
                                            <tr>
                                                <th>Desconto:</th>
                                                <td><span>0%</span></td>
                                            </tr>
                                            <tr>
                                                <th>Valor Total:</th>
                                                <td><span>MZN {{ $curso->preco }}</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Item -->

                    <!-- Invoice Information -->
                    <div class="other-info">
                        <h4>Informaçao Adicional</h4>
                        <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed dictum ligula, cursus blandit risus. Maecenas eget metus non tellus dignissim aliquam ut a ex. Maecenas sed vehicula dui, ac suscipit lacus. Sed finibus leo vitae lorem interdum, eu scelerisque tellus fermentum. Curabitur sit amet lacinia lorem. Nullam finibus pellentesque libero.</p>
                    </div>
                    <!-- /Invoice Information -->

                </div>
            </div>
        </div>

    </div>

</div>
<!-- /Page Content -->
@endsection