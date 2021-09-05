@extends('admin.layouts.auth')

@section('content')
<div class="loginbox">
    <div class="login-left">
        <img class="img-fluid" src="adminn/assets/img/logo-white.png" alt="Logo">
    </div>
    <div class="login-right">
        <div class="login-right-wrap">
            <h1>Registro</h1>
            <p class="account-subtitle">Acesse o seu Painel de Controle</p>

            <!-- Form -->
            <form action="{{ route('tutor.store') }}" method="POST" role="form" >
                @csrf
                <div class="form-group">
                    <input class="form-control" name="nome" type="text" placeholder="Introduza o nome">
                    @error('nome')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control" name="sobrenome" type="text" placeholder="Introduza o apelido">
                </div>
                <div class="form-group">
                    <input class="form-control" name="email" type="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <input class="form-control" name="numero" type="text" placeholder="Introduza o contacto celular">
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <input class="form-control" name="password" type="password" placeholder="Senha">
                    </div>
                    <div class="form-group col-md-6">
                        <input class="form-control" name="password_confirmation" type="password" placeholder="Repetir senha">
                    </div>
                </div>
                <div class="form-group mb-0">
                    <button class="btn btn-primary btn-block" type="submit">Registar</button>
                </div>
            </form>
            <!-- /Form -->

            <div class="login-or">
                <span class="or-line"></span>
                <span class="span-or">ou</span>
            </div>

            <!-- Social Login -->
            <!-- <div class="social-login">
                <span>Register with</span>
                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a><a href="#" class="google"><i class="fa fa-google"></i></a>
            </div> -->
            <!-- /Social Login -->

            <div class="text-center dont-have">Possui uma conta? <a href="{{ route('login') }}">Entre daqui</a></div>
        </div>
    </div>
</div>
@endsection