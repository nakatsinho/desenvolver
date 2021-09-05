@extends('admin.layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Definiçoes Gerais</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="javascript:(0)">Definiçoes</a></li>
                        <li class="breadcrumb-item active">Definiçoes Gerais</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">

            <div class="col-12">

                <!-- General -->

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Fichas de Apoio, Documentos, Exercicios</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.ficha.store') }}" role="form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Nome do Documento</label>
                                <input type="text" name="nome" class="form-control" required autofocus>
                            </div>
                            <div class="form-group">
                                <label>Selecione o Curso</label>
                                <select name="curso_id" id="curso_id" class="form-control">
                                    @foreach($curso as $id=>$value)
                                    <option value="{{$id}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Selecione o Modulo</label>
                                <select name="modulo_id" id="modulo_id" class="form-control">
                                    @foreach($modulo as $id=>$value)
                                    <option value="{{$id}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Anexe o Documento</label>
                                <input type="file" name="path" class="form-control" required>
                                <small class="text-secondary">Tamanho Recomendado <b>8Mbs max</b></small>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn bg-success-light">Submeter</button>
                            </div>

                        </form>
                    </div>
                </div>

                <!-- /General -->

            </div>
        </div>

    </div>
</div>
@endsection