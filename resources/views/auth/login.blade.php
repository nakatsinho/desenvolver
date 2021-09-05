@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <!-- Login Tab Content -->
                <div class="account-content">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 col-lg-6 login-left">
                            <img src="assets/img/login-banner.png" class="img-fluid" alt="Academia Desenvolver | Login">
                        </div>
                        <div class="col-md-12 col-lg-6 login-right">
                            <div class="login-header">
                                <h3>Entrar <span>| Academia Desenvolver</span></h3>
                            </div>
                            <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group form-focus">
                                    <input name="email" type="text" class="form-control @error('email') is-invalid @enderror">
                                    <label class="focus-label">Email ou Numero de Telefone</label>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group form-focus">
                                    <input name="password" type="password" class="form-control floating">
                                    <label class="focus-label">Senha</label>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="text-right">
                                    @if (Route::has('password.request'))
                                    <a class="forgot-link" href="{{ route('password.request') }}">Esqueceu senha ?</a>
                                    @endif
                                </div>
                                <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Entrar</button>
                                <div class="login-or">
                                    <span class="or-line"></span>
                                    <span class="span-or">ou</span>
                                </div>
                                <div class="row form-row social-login">
                                    <div class="col-6">
                                        <a href="{{ url('auth/facebook') }}" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> com Facebook</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{ url('auth/google') }}" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> com Google</a>
                                    </div>
                                </div>
                                <div class="text-center dont-have">Precisa de nova conta? <a href="{{ route('register') }}">Registe-se</a></div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Login Tab Content -->
            </div>
        </div>
    </div>
</div>
@endsection