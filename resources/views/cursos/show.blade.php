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
                        <li class="breadcrumb-item active" aria-current="page">{{$curso->nome}}</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">{{$curso->nome}}</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container">
        <!-- Doctor Widget -->
        <div class="card">
            <div class="card-body">
                <div class="doctor-widget">
                    <div class="doc-info-left">
                        <div class="doctor-img">
                            <img src="{{ url('adminn/assets/img/courses/',$curso->foto) }}" class="img-fluid" alt="User Image">
                        </div>
                        <div class="doc-info-cont">
                            <h4 class="doc-name">{{$curso->nome}}</h4>
                            <p class="doc-speciality">{{$curso->desc}}</p>
                            <p class="doc-department">
                                <!-- <img src="assets/img/specialities/specialities-05.png" class="img-fluid" alt="Speciality"> -->
                            </p>
                            <!-- <div class="rating">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star"></i>
                                <span class="d-inline-block average-rating">(35)</span>
                            </div> -->
                            <!-- <div class="clinic-details">
                                <p class="doc-location"><i class="fas fa-map-marker-alt"></i> Newyork, USA - <a href="javascript:void(0);">Get Directions</a></p>
                                <ul class="clinic-gallery">
                                    <li>
                                        <a href="assets/img/features/feature-01.jpg" data-fancybox="gallery">
                                            <img src="assets/img/features/feature-01.jpg" alt="Feature">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="assets/img/features/feature-02.jpg" data-fancybox="gallery">
                                            <img src="assets/img/features/feature-02.jpg" alt="Feature Image">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="assets/img/features/feature-03.jpg" data-fancybox="gallery">
                                            <img src="assets/img/features/feature-03.jpg" alt="Feature">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="assets/img/features/feature-04.jpg" data-fancybox="gallery">
                                            <img src="assets/img/features/feature-04.jpg" alt="Feature">
                                        </a>
                                    </li>
                                </ul>
                            </div> -->
                            <!-- <div class="clinic-services">
                                <span>Dental Fillings</span>
                                <span>Teeth Whitneing</span>
                            </div> -->
                        </div>
                    </div>
                    <div class="doc-info-right">
                        <div class="clini-infos">
                            <ul>
                                <li><strong>Monitor(es)</strong></li>
                                @foreach($getTutor as $value2)
                                    <?php 
                                            $tutor = DB::table('users')->where('id',$value2->user_id)->get();
                                    ?>
                                    @foreach($tutor as $val)
                                    <li> <a href="{{ route('tutor.show',$val->id) }}">{{$val->nome}}</a> - Perfil </li>
                                    @endforeach
                                @endforeach
                                <li><i class="far fa-money-bill-alt"></i> MZN {{$curso->preco}} </li>
                            </ul>
                        </div>
                        <div class="doctor-action center">
                            <a href="javascript:void(0)" class="btn btn-white fav-btn">
                                <i class="far fa-bookmark"></i>
                            </a>
                            <a href="chat.html" class="btn btn-white msg-btn">
                                <i class="far fa-comment-alt"></i>
                            </a>
                            <a href="javascript:void(0)" class="btn btn-white call-btn" data-toggle="modal" data-target="#voice_call">
                                <i class="fas fa-phone"></i>
                            </a>
                        </div>
                        <div class="clinic-booking">
                            @if(!$userBoughtCourse)
                            <a class="btn view-btn" href="{{ route('checkout.show', $curso->id) }}">Pagar Agora</a>
                            @else
                            <a class="apt-btn" href="{{ route('modulos.show', $curso->id) }}">Fazer Curso</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Doctor Widget -->

        <!-- Doctor Details Tab -->
        <div class="card">
            <div class="card-body pt-0">

                <!-- Tab Menu -->
                <nav class="user-tabs mb-4">
                    <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                        <li class="nav-item">
                            <a class="nav-link active" href="#doc_overview" data-toggle="tab">Apresentaçao</a>
                        </li>
                    </ul>
                </nav>
                <!-- /Tab Menu -->

                <!-- Tab Content -->
                <div class="tab-content pt-0">

                    <!-- Overview Content -->
                    <div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
                        <div class="row">
                            <div class="col-md-12 col-lg-9">
                                <!-- About Details -->
                                {!! optional($overview)->desc !!}
                            </div>
                        </div>
                    </div>
                    <!-- /Overview Content -->
                </div>
            </div>
        </div>
        <!-- /Doctor Details Tab -->
    </div>
</div>
<!-- /Page Content -->
@endsection