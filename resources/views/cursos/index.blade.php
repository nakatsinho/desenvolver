@extends('layouts.app')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Nossos Cursos</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Todos Nossos Cursos</h2>
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
                        <a href="{{ route('cursos.show', $value->id) }}">
                            <img class="img-fluid" alt="User Image" src="{{ url('adminn/assets/img/courses/',$value->foto) }}">
                        </a>
                        <a href="javascript:void(0)" class="fav-btn">
                            <i class="far fa-bookmark"></i>
                        </a>
                    </div>
                    <div class="pro-content">
                        <h3 class="title">
                            <a href="{{ route('cursos.show', $value->id) }}">{{$value->nome}}</a>
                            <i class="fas fa-check-circle verified"></i>
                        </h3>
                        <p class="speciality">{{$value->desc}}</p>
                        <ul class="available-info">
                            <li>
                                <b>Valor do Curso</b>
                            </li>
                            <li>
                                <i class="far fa-money-bill-alt"></i> MZN {{$value->preco}}
                                <i class="fas fa-info-circle" data-toggle="tooltip" title="Valor a pagar para inciar o curso"></i>
                            </li>
                        </ul>
                        <div class="row row-sm">
                            <div class="col-12">
                                <a href="{{ route('cursos.show',$value->id) }}" class="btn view-btn">Ver Detalhes</a>
                            </div>
                            <!-- <div class="col-6">
                                <a href="{{ route('teste.show', $value->id) }}" class="btn book-btn">Aceder</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>
<!-- /Page Content -->
@endsection