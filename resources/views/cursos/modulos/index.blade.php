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
                        <li class="breadcrumb-item active" aria-current="page">Apresentaçao dos modulos</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Doctor Profile pertencente ao curso de </h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->
<!-- Page Content -->
<div class="content">
    <div class="container">
        <!-- Doctor Details Tab -->
        <div class="card">
            <div class="card-body pt-0">
                <!-- Tab Menu -->
                <nav class="user-tabs mb-4">
                    <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                        @foreach($modulo as $value)
                        <li class="nav-item">
                            <a class="nav-link " href="#{{ $value->anexo_id }}" data-toggle="tab">{{$value->nome}}</a>
                        </li>
                        @endforeach
                    </ul>
                </nav>
                <!-- /Tab Menu -->
                <!-- Tab Content -->
                <div class="tab-content pt-0">
                    <!-- Overview Content -->
                    @foreach($modulo as $value)
                    <div role="tabpanel" id="{{ $value->anexo_id }}" class="tab-pane fade show ">
                        <div class="row">
                            <div class="col-md-12 col-lg-9">
                                <!-- About Details -->
                                <div class="widget about-widget">
                                    <h4 class="widget-title">Descriçao</h4>
                                    <p>{{ $value->desc }}</p>
                                </div>
                                <!-- /About Details -->
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- /Overview Content -->
                </div>
            </div>
        </div>
        <!-- /Doctor Details Tab -->
    </div>
</div>
<!-- /Page Content -->
@endsection