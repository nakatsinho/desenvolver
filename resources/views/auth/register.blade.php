@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <!-- Register Content -->
                <div class="account-content">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 col-lg-6 login-left">
                            <img src="assets/img/login-banner.png" class="img-fluid" alt="Doccure Register">
                        </div>
                        <div class="col-md-12 col-lg-6 login-right">
                            <div class="login-header">
                                <h3>Registro do Estudante <a href="{{ route('tutor.index') }}">E' Monitor?</a></h3>
                            </div>

                            <!-- Register Form -->
                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group form-focus">
                                    <input name="nome" type="text" class="form-control floating" required>
                                    <label class="focus-label">Nome</label>
                                </div>
                                <div class="form-group form-focus">
                                    <input name="email" type="text" class="form-control floating" required>
                                    <label class="focus-label">E-Mail</label>
                                    @error('email')
                                    <span class="" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group form-focus">
                                    <input name="numero" type="text" class="form-control floating" required>
                                    <label class="focus-label">Telefone</label>
                                </div>
                                <div class="form-group form-focus">
                                    <input name="password" type="password" class="form-control floating" required>
                                    <label class="focus-label">Criar Senha</label>
                                </div>
                                <div class="form-group form-focus">
                                    <input name="password_confirmation" type="password" class="form-control floating" required>
                                    <label class="focus-label">Repetir Senha</label>
                                </div>
                                <div class="text-right">
                                    <a class="forgot-link" href="login.html">Ja possui uma conta?</a>
                                </div>
                                <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Registar-se</button>
                                <div class="login-or">
                                    <span class="or-line"></span>
                                    <span class="span-or">ou</span>
                                </div>
                                <div class="row form-row social-login">
                                    <div class="col-6">
                                        <a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> com Facebook</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> com Google</a>
                                    </div>
                                </div>
                            </form>
                            <!-- /Register Form -->
                        </div>
                    </div>
                </div>
                <!-- /Register Content -->
            </div>
        </div>
    </div>
</div>
@endsection