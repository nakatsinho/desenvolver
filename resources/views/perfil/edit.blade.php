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
                        <li class="breadcrumb-item active" aria-current="page">Definiçoes de Perfil</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Definiçoes de Perfil</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">

            <!-- Profile Sidebar -->
            @include('perfil.navbar')
            <!-- /Profile Sidebar -->

            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-body">

                        <!-- Profile Settings Form -->
                        <form method="POST" role="form" action="{{ route('perfil.update',$user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row form-row">
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <div class="change-avatar">
                                            <div class="profile-img">
                                                <img src="{{ url('assets/img/users/',Auth::user()->foto) }}" alt="User Image">
                                            </div>
                                            <div class="upload-img">
                                                <div class="change-photo-btn">
                                                    <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                    <input type="file" name="foto" class="upload">
                                                </div>
                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" name="nome" value="{{$user->nome}}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Apelido</label>
                                        <input type="text" class="form-control" name="sobrenome" value="{{$user->sobrenome}}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Data de Nascimento</label>
                                        <div class="cal-icon">
                                            <input type="date" class="form-control " name="nascimento" value="{{$user->nascimento}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Email ID</label>
                                        <input type="email" class="form-control" name="email" value="{{$user->email}}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Telefone</label>
                                        <input type="text" value="{{$user->numero}}" name="numero" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>WhatsApp</label>
                                        <input type="text" value="{{$user->whatsapp}}" name="whatsapp" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Endereço Fisico <samp>(Bairro, Q. , Rua, Av., Casa)</samp></label>
                                        <input type="text" class="form-control" name="local" value="{{$user->local}}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Distrito</label>
                                        <select class="form-control select" name="distrito_id">
                                            @foreach($distrito as $id=>$value)
                                            <option value="{{$id}}">{{$value}}</option>
                                            @endforeach
                                        </select>                                    
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Provincia</label>
                                        <select class="form-control select" name="provincia_id">
                                            @foreach($provincia as $id=>$value)
                                            <option value="{{$id}}">{{$value}}</option>
                                            @endforeach
                                        </select>                                    
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Zip</label>
                                        <input type="text" class="form-control" value="13420">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Pais</label>
                                        <select class="form-control select" name="pais_id">
                                            @foreach($pais as $id=>$value)
                                            <option value="{{$id}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Guardar Alteraçoes</button>
                            </div>
                        </form>
                        <!-- /Profile Settings Form -->

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /Page Content -->
@endsection