@extends('layouts.app')

@section('content')
<!-- Home Banner -->
<section class="section section-search">
    <div class="container-fluid">
        <div class="banner-wrapper">
            <div class="banner-header text-center">
                <h1>Procure pelo curso, actualize-se!</h1>
                <p>Descubra os melhores modulos, conteudos & forums sem fazer esforço.</p>
            </div>

            <!-- Search -->
            <div class="search-box">
                <form action="{{route('pesquisa.curso')}}">
                    <div class="form-group search-location">
                        <input type="text" class="form-control" placeholder="Pesquise o Local">
                        <span class="form-text">Baseado na Localizaçao</span>
                    </div>
                    <div class="form-group search-info">
                        <input type="text" name="queryCurso" class="form-control" placeholder="Pesquise por Cursos, Modulos, Conteudos, Etc">
                        <span class="form-text">Ex : Inteligencia Artificial, Biologia Celular, etc</span>
                    </div>
                    <button type="submit" class="btn btn-primary search-btn"><i class="fas fa-search"></i> <span>Pesquisar</span></button>
                </form>
            </div>
            <!-- /Search -->

        </div>
    </div>
</section>
<!-- /Home Banner -->

<!-- Clinic and Specialities -->
<section class="section section-specialities">
    <div class="container-fluid">
        <div class="section-header text-center">
            <h2>Formaçao Online Sem Limites</h2>
            <p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-9">
                <!-- Slider -->
                <div class="specialities-slider slider">

                    <!-- Slider Item -->
                    <div class="speicality-item text-center">
                        <div class="speicality-img">
                            <img src="assets/img/specialities/specialities-01.png" class="img-fluid" alt="Speciality">
                            <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                        </div>
                        <p>Sociedade</p>
                    </div>
                    <!-- /Slider Item -->

                    <!-- Slider Item -->
                    <div class="speicality-item text-center">
                        <div class="speicality-img">
                            <img src="assets/img/specialities/specialities-02.png" class="img-fluid" alt="Speciality">
                            <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                        </div>
                        <p>Ciencia</p>
                    </div>
                    <!-- /Slider Item -->

                    <!-- Slider Item -->
                    <div class="speicality-item text-center">
                        <div class="speicality-img">
                            <img src="assets/img/specialities/specialities-03.png" class="img-fluid" alt="Speciality">
                            <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                        </div>
                        <p>Tecnologia</p>
                    </div>
                    <!-- /Slider Item -->

                    <!-- Slider Item -->
                    <div class="speicality-item text-center">
                        <div class="speicality-img">
                            <img src="assets/img/specialities/specialities-04.png" class="img-fluid" alt="Speciality">
                            <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                        </div>
                        <p>Saude</p>
                    </div>
                    <!-- /Slider Item -->

                    <!-- Slider Item -->
                    <div class="speicality-item text-center">
                        <div class="speicality-img">
                            <img src="assets/img/specialities/specialities-05.png" class="img-fluid" alt="Speciality">
                            <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                        </div>
                        <p>Comunicaçao</p>
                    </div>
                    <!-- /Slider Item -->

                </div>
                <!-- /Slider -->

            </div>
        </div>
    </div>
</section>
<!-- Clinic and Specialities -->

<!-- Popular Section -->
<section class="section section-doctor">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-header ">
                    <h2>Cursos Mais Recentes</h2>
                    <p>Lorem Ipsum is simply dummy text </p>
                </div>
                <div class="about-content">
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.</p>
                    <p>web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes</p>
                    <a href="{{ route('cursos.index') }}">Ver Mais...</a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="doctor-slider slider">
                    <!-- Doctor Widget -->
                    @foreach($cursos as $value)
                    <div class="profile-widget">
                        <div class="doc-img">
                            <a href="{{ route('cursos.show',$value->id) }}">
                                <img class="img-fluid" alt="User Image" src="{{ url('adminn/assets/img/courses/',$value->foto) }}">
                            </a>
                            <a href="javascript:void(0)" class="fav-btn">
                                <i class="far fa-bookmark"></i>
                            </a>
                        </div>
                        <div class="pro-content">
                            <h3 class="title">
                                <a href="{{ route('cursos.show',$value->id) }}">{{$value->nome}}</a>
                                <!-- <i class="fas fa-check-circle verified"></i> -->
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
                                    <a href="#" class="btn book-btn">Aceder</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- /Doctor Widget -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Popular Section -->

<!-- Availabe Features -->

<!-- Availabe Features -->
@endsection