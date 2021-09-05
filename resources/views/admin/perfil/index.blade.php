@extends('admin.layouts.app')

@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Perfil</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Painel de Controle</a></li>
                        <li class="breadcrumb-item active">Perfil</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <div class="profile-header">
                    <div class="row align-items-center">
                        <div class="col-auto profile-image">
                            <a href="#">
                                <img class="rounded-circle" alt="User Image" src="{{ url('adminn/assets/img/users/',Auth::user()->foto) }}">
                            </a>
                        </div>
                        <div class="col ml-md-n2 profile-user-info">
                            <h4 class="user-name mb-0">{{ $perfil->nome }} {{ $perfil->sobrenome }}</h4>
                            <h6 class="text-muted">{{ $perfil->email }}</h6>
                            <div class="user-Location"><i class="fa fa-map-marker"></i> {{ implode(',', $perfil->provincia()->pluck('nome')->toArray()) }}, {{ implode(',', $perfil->pais()->pluck('nome')->toArray()) }}</div>
                            <div class="about-text">{{ $perfil->desc }}.</div>
                        </div>
                        <div class="col-auto profile-btn">

                            <a data-toggle="modal" href="#edit_personal_details" class="btn btn-primary">
                                Editar
                            </a>
                        </div>
                    </div>
                </div>
                <div class="profile-menu">
                    <ul class="nav nav-tabs nav-tabs-solid">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#per_details_tab">Acerca de mim</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#password_tab">Minha Senha</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content profile-tab-cont">

                    <!-- Personal Details Tab -->
                    <div class="tab-pane fade show active" id="per_details_tab">

                        <!-- Personal Details -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between">
                                            <span>Dados Pessoais</span>
                                            <a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Editar</a>
                                        </h5>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Nome</p>
                                            <p class="col-sm-10">{{ $perfil->nome }} {{ $perfil->sobrenome }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Nascimento</p>
                                            <p class="col-sm-10">{{ $perfil->nascimento }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
                                            <p class="col-sm-10">{{ $perfil->email }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Telefone</p>
                                            <p class="col-sm-10">{{ $perfil->numero }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">WhatsApp</p>
                                            <p class="col-sm-10">{{ $perfil->whatsapp }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0">Endereço Fisico</p>
                                            <p class="col-sm-10 mb-0">{{ $perfil->local }}<br>
                                                {{ implode(',', $perfil->distrito()->pluck('nome')->toArray()) }},<br>
                                                {{ implode(',', $perfil->provincia()->pluck('nome')->toArray()) }},<br>
                                                {{ implode(',', $perfil->pais()->pluck('nome')->toArray()) }}.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Edit Details Modal -->
                                <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Dados Pessoais</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('admin.perfil.update',$perfil->user_id) }}" role="form" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row form-row">
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Nome</label>
                                                                <input type="text" class="form-control" value="{{ $perfil->nome }}" name="nome">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Sobrenome</label>
                                                                <input type="text" class="form-control" value="{{ $perfil->sobrenome }}" name="sobrenome">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Data de Nascimento</label>
                                                                <div class="cal-icon">
                                                                    <input type="date" class="form-control" value="{{ $perfil->nascimento }}" name="nascimento">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Email ID</label>
                                                                <input type="email" class="form-control" value="{{ $perfil->email }}" name="email">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Telefone</label>
                                                                <input type="text" value="{{ $perfil->numero }}" class="form-control" name="numero">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <h5 class="form-title"><span>Endereços</span></h5>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Local</label>
                                                                <input type="text" class="form-control" value="{{ $perfil->local }}" name="local">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Foto</label>
                                                                <input type="file" class="form-control" value="{{ $perfil->foto }}" name="foto">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Distrito</label>
                                                                <select class="form-control select" name="distrito_id">
                                                                    @foreach($distrito as $id=>$value)
                                                                    <option value="{{$id}}">{{$value}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Provincia</label>
                                                                <select class="form-control select" name="provincia_id">
                                                                    @foreach($provincia as $id=>$value)
                                                                    <option value="{{$id}}">{{$value}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Zip Code</label>
                                                                <input type="text" class="form-control" name="zip" value="22434">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Country</label>
                                                                <select class="form-control select" name="pais_id">
                                                                    @foreach($pais as $id=>$value)
                                                                    <option value="{{$id}}">{{$value}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary btn-block">Guardar Alteraçoes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Edit Details Modal -->

                            </div>


                        </div>
                        <!-- /Personal Details -->

                    </div>
                    <!-- /Personal Details Tab -->

                    <!-- Change Password Tab -->
                    <div id="password_tab" class="tab-pane fade">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Change Password</h5>
                                <div class="row">
                                    <div class="col-md-10 col-lg-6">
                                        <form>
                                            <div class="form-group">
                                                <label>Old Password</label>
                                                <input type="password" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input type="password" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" class="form-control">
                                            </div>
                                            <button class="btn btn-primary" type="submit">Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Change Password Tab -->

                </div>
            </div>
        </div>

    </div>
</div>
<!-- /Page Wrapper -->

@endsection