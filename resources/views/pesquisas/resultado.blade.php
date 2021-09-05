@extends('layouts.app')

@section('content')
<!-- Main Wrapper -->
<div class="main-wrapper">
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index-2.html">Incio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Resultado de Pesquisa</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">{{$curso->count()}} resuldo(s) relacionados com : "{{ Request::input('queryCurso') }}"</h2>
                </div>
                <div class="col-md-4 col-12 d-md-block d-none">
                    <div class="sort-by">
                        <span class="sort-title">Sort by</span>
                        <span class="sortby-fliter">
                            <select class="select">
                                <option>Select</option>
                                <option class="sorting">Rating</option>
                                <option class="sorting">Popular</option>
                                <option class="sorting">Latest</option>
                                <option class="sorting">Free</option>
                            </select>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->
    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">

                    <!-- Search Filter -->
                    <div class="card search-filter">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Filtro de Pesquisa</h4>
                        </div>
                        <div class="card-body">
                            <div class="filter-widget">
                                <div class="cal-icon">
                                    <input type="text" class="form-control datetimepicker" placeholder="Selecione a Data">
                                </div>
                            </div>
                            <div class="filter-widget">
                                <h4>Genero</h4>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="gender_type" checked>
                                        <span class="checkmark"></span> Tutor Masculino
                                    </label>
                                </div>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="gender_type">
                                        <span class="checkmark"></span> Tutor Feminino
                                    </label>
                                </div>
                            </div>
                            <div class="filter-widget">
                                <h4>Selecione Cursos</h4>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="select_specialist" checked>
                                        <span class="checkmark"></span> Biologia
                                    </label>
                                </div>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="select_specialist" checked>
                                        <span class="checkmark"></span> Base de Dados
                                    </label>
                                </div>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="select_specialist">
                                        <span class="checkmark"></span> Mineraçao
                                    </label>
                                </div>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="select_specialist">
                                        <span class="checkmark"></span> Geografia
                                    </label>
                                </div>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="select_specialist">
                                        <span class="checkmark"></span> Jornalismo
                                    </label>
                                </div>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="select_specialist">
                                        <span class="checkmark"></span> Agricultura
                                    </label>
                                </div>
                            </div>
                            <div class="btn-search">
                                <button type="button" class="btn btn-block">Pesquisar</button>
                            </div>
                        </div>
                    </div>
                    <!-- /Search Filter -->

                </div>
                <div class="col-md-12 col-lg-8 col-xl-9">
                    <!-- Doctor Widget -->
                    @forelse($curso as $value)
                    <div class="card">
                        <div class="card-body">
                            <div class="doctor-widget">
                                <div class="doc-info-left">
                                    <div class="doctor-img">
                                        <a href="#">
                                            <img src="{{url('assets/img/doctors/',$value->foto)}}" class="img-fluid" alt="User Image">
                                        </a>
                                    </div>
                                    <div class="doc-info-cont">
                                        <h4 class="doc-name"><a href="#">{{$value->nome}}</a></h4>
                                        <p class="doc-speciality">{{$value->desc}}</p>
                                        <!-- <h5 class="doc-department"><img src="assets/img/specialities/specialities-05.png" class="img-fluid" alt="Speciality">Dentist</h5> -->
                                        <!-- <div class="rating">
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star"></i>
                                            <span class="d-inline-block average-rating">(17)</span>
                                        </div> -->
                                        <div class="clinic-details">
                                            <p class="doc-location"><i class="fas fa-map-marker-alt"></i> Maputo, MOZ</p>
                                            <ul class="clinic-gallery">
                                                <li>
                                                    <a href="assets/img/features/feature-01.jpg" data-fancybox="gallery">
                                                        <img src="assets/img/features/feature-01.jpg" alt="Feature">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="assets/img/features/feature-02.jpg" data-fancybox="gallery">
                                                        <img src="assets/img/features/feature-02.jpg" alt="Feature">
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
                                        </div>
                                        <div class="clinic-services">
                                            <span>Auditoria Interna</span>
                                            <span> Finanças</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="doc-info-right">
                                    <div class="clini-infos">
                                        <ul>
                                            <li><i class="far fa-thumbs-up"></i> 98%</li>
                                            <li><i class="far fa-comment"></i> 0 Feedback</li>
                                            <li><i class="fas fa-map-marker-alt"></i> Maputo, MOZ</li>
                                            <li><i class="far fa-money-bill-alt"></i> MZN {{$value->preco}} <i class="fas fa-info-circle" data-toggle="tooltip" title="Valor a pagar para inciar curso"></i> </li>
                                        </ul>
                                    </div>
                                    <div class="clinic-booking">
                                        <a class="view-pro-btn" href="#">Ver Detalhes</a>
                                        <a class="apt-btn" href="#">Aceder ao Curso</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="card">
                        <div class="card-body">
                            <div class="doctor-widget">
                                <h3 class="doc-name">Opps!!! Resultados de busca nao encontrados!</h3>
                            </div>
                        </div>
                    </div>
                    @endforelse
                    <!-- /Doctor Widget -->
                    <div class="load-more text-center">
                        <a class="btn btn-primary btn-sm" href="javascript:void(0);">Ver Mais</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
</div>
<!-- /Main Wrapper -->
@endsection