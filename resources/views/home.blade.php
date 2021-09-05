@extends('layouts.app')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html">Incio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Meus Cursos</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Meus Cursos</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">
        <div class="row ">
            @forelse($cursos as $value)
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="profile-widget">
                    <div class="doc-img">
                    <h5 class="title">
                            <a href="{{ route('cursos.show', $value->id) }}">{{$value->nome}}</a>
                            <i class="fas fa-check-circle verified"></i>
                        </h5>
                        <a href="{{ route('cursos.show', $value->id) }}">
                            <img class="img-fluid" alt="User Image" src="{{ url('adminn/assets/img/courses/',$value->foto) }}">
                        </a>
                        <a href="javascript:void(0)" class="fav-btn">
                            <i class="far fa-bookmark"></i>
                        </a>
                    </div>
                    <div class="pro-content">
                        
                        <div class="row row-sm">
                            <div class="col-12">
                                <a href="{{ route('cursos.show',$value->id) }}" class="btn view-btn">Fazer Curso</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-md-8 col-lg-4 col-xl-12">
                <div class="justify-content-center">
                    <!-- Success Card -->
                    <div class="success-cont">
                        <i class="fas fa-pen"></i>
                        <h3>Voçê ainda não está inscrito em nenhum Curso!</h3>
                        <p>Bem-vindo a nossa plataforma <strong>{{ Auth::user()->nome }},</strong><br> Voçê deu entrada a <strong>{{ Auth::user()->created_at }}</strong></p>
                        <a href="{{ route('cursos.index') }}" class="btn btn-warning view-inv-btn">Ver Todos Cursos</a>
                    </div>
                    <!-- /Success Card -->
                </div>
            </div>
            @endforelse
        </div>
        <!-- <div class="row">
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card widget-profile pat-widget-profile">
                    <a href="#">
                        <div class="card-body">
                            <div class="justify-content-center">
                                <div class="success-cont">
                                    <i class="fas fa-pen"></i>
                                    <h3>Temos mais cursos disponiveis para si!</h3>
                                    <p>Pode aceder à mais <strong>cursos,</strong><br> clicando no botão <strong>abaixo.</strong></p>
                                    <a href="invoice-view.html" class="btn btn-warning view-inv-btn">Ver Mais Cursos</a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div> -->
    </div>
</div>
<!-- /Page Content -->
@endsection