@extends('layouts.app')

@section('js')
<script>
    (function(d, s, id) {
        var js, mpesa = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "{{ asset('assets/mpesa/src/button.min.js') }}";
        mpesa.parentNode.insertBefore(js, mpesa);
    }(document, 'script', 'mpesa_btn_js'));
</script>
@endsection
@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Janela de Pagamento</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Pagamento do Curso</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container">

        <div class="row">
            <div class="col-md-7 col-lg-8">
                <div class="card">
                    <div class="card-body">

                        <!-- Checkout Form -->
                        <form action="{{ route('checkout.update',$curso->id) }}" method="POST" role="form" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- Personal Information -->
                            <div class="info-widget">
                                <h4 class="card-title">Informaçao Pessoal <span>
                                        <!--<button class="btn btn-success" onclick="fillInDummyInfo()">Preencher com dados de exemplo</button>-->
                                    </span></h4>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Primeiro Nome</label>
                                            <input class="form-control" type="text" id="first_name" name="nome" aria-describedby="first_name" value="{{ $user->nome }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Apelido</label>
                                            <input class="form-control" type="text" id="last_name" name="sobrenome" aria-describedby="last_name" value="{{ $user->sobrenome }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>E-mail</label>
                                            <input class="form-control" type="email" id="email_address" name="user_email" aria-describedby="email_address" value="{{ $user->email }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Telefone</label>
                                            <input class="form-control" type="text" id="phone" name="numero" aria-describedby="phone" value="{{ $user->numero }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Provincia</label>
                                            <select class="form-control" name="provincia_id" id="provincia_id">
                                                @foreach($provincia as $id=>$value)
                                                <option value="{{$id}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Bairro</label>
                                            <input class="form-control" type="text" id="local" name="local" aria-describedby="apartment" value="{{old('local')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Residencia</label>
                                            <input class="form-control" type="text" id="apartment" name="casa" aria-describedby="apartment" value="{{old('apartment')}}">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Pais</label>
                                            <select class="form-control" name="pais_id" id="pais_id">
                                                @foreach($pais as $id=>$value)
                                                <option value="{{$id}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Distrito</label>
                                            <select class="form-control" name="distrito_id" id="distrito_id">
                                                @foreach($distrito as $id=>$value)
                                                <option value="{{$id}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Codigo Postal</label>
                                            <input class="form-control" type="text" id="zip" name="zip" aria-describedby="zip" value="{{old('zip')}}" placeholder="Mpt = 1100 / Matola = 1110">
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="exist-customer">Possui Conta? <a href="#">Clique aqui para Entrar</a></div> -->
                            </div>
                            <!-- /Personal Information -->

                            <div class="payment-widget">
                                <h4 class="card-title">Metodo de Pagamento</h4>

                                <!-- Credit Card Payment -->
                                <div class="payment-list">
                                    <label class="payment-radio credit-card-option">
                                        <input type="radio" name="radio" checked>
                                        <span class="checkmark"></span>
                                        M-PESA
                                    </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group card-label">
                                                <label for="amount" class="mpesaLabel">Valor a Pagar</label>
                                                <input class="mpesaInput" type="text" placeholder="Valor em Metical" disabled value="{{$curso->preco}}" name="valor" id="mpesaAmount"></input>
                                                <br>
                                                <label for="phone" class="mpesaLabel">Seu Numero com M-Pesa</label>
                                                <input class="mpesaInput" type="text" placeholder="Introduza o teu 84/85" name="contacto" id="mpesaPhoneNumber"></input>
                                                <br>
                                                <p>Uma solicitação de pagamento M-Pesa será enviada para o seu telefone em breve!</p>
                                                <!-- <div id='mpesaButton'></div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Credit Card Payment -->

                                <!-- Terms Accept -->
                                <div class="terms-accept" id="terms_privacy_div">
                                    <div class="custom-checkbox">
                                        <input type="checkbox" id="terms_checkbox" autocomplete="off">
                                        <label for="terms_checkbox">Eu li e concordo com os <a href="{{ route('termos.index') }}" target="_blank">Termos &amp; Condiçoes</a>.</label>
                                    </div>
                                </div>
                                <!-- /Terms Accept -->

                                <input type="hidden" id="total" name="total" value="{{ $curso->preco }}">
                                <input type="hidden" name="curso_id" value="{{ $curso->id }}">
                                <!-- Submit Section -->
                                <div class="submit-section mt-4">
                                    <button type="submit" class="btn btn-primary submit-btn"> <img style="width: 35px; display: inline; margin: 1px;" src="{{ url('assets/mpesa/images/mpesa.png')}}" alt="mpesaBtn"> Confirmar & Pagar</button>
                                </div>
                                <!-- /Submit Section -->
                            </div>
                        </form>
                        <!-- /Checkout Form -->

                    </div>
                </div>

            </div>

            <div class="col-md-5 col-lg-4 theiaStickySidebar">

                <!-- Booking Summary -->
                <div class="card booking-card">
                    <div class="card-header">
                        <h4 class="card-title">Resumo de Pagamento</h4>
                    </div>
                    <div class="card-body">

                        <!-- Booking Doctor Info -->
                        <div class="booking-doc-info">
                            <a href="{{ route('cursos.show',$curso->id) }}" class="booking-doc-img">
                                <img src="{{ url('adminn/assets/img/courses/',$curso->foto) }}" alt="User Image">
                            </a>
                            <div class="booking-info">
                                <h4><a href="{{ route('cursos.show',$curso->id) }}">{{$curso->nome}}</a></h4>
                                <div class="clinic-details">
                                    <p class="doc-location">
                                        <strong>Tutores:</strong>
                                    <ul>
                                        @foreach($getTutor as $value2)
                                        <?php
                                        $tutor = DB::table('users')->where('id', $value2->user_id)->get();
                                        ?>
                                        @foreach($tutor as $val)
                                        <li> <a href="{{ route('tutor.show',$val->id) }}">{{$val->nome}}</a> - Perfil </li>
                                        @endforeach
                                        @endforeach
                                    </ul>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Booking Doctor Info -->

                        <div class="booking-summary">
                            <div class="booking-item-wrap">
                                <ul class="booking-date">
                                    <li>Duraçao <span>{{$curso->duracao}}</span></li>
                                </ul>
                                <ul class="booking-fee">
                                    <li>Lançamento <span>{{$curso->lancamento}}</span></li>
                                    <li>Estado <span>{{ implode(',',$curso->status()->pluck('nome')->toArray()) }}</span></li>
                                </ul>
                                <div class="booking-total">
                                    <ul class="booking-total-list">
                                        <li>
                                            <span>Total</span>
                                            <span class="total-cost">MZN {{$curso->preco}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Booking Summary -->

            </div>
        </div>

    </div>

</div>
<!-- /Page Content -->
@endsection

@include('js-for-views.checkout-js')