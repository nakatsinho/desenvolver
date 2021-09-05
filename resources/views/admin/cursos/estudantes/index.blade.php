@extends('admin.layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Lista de Estudantes</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="javascript:(0);">Usuarios</a></li>
                        <li class="breadcrumb-item active">Estudantes</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Nome do Estudante</th>
                                        <th>Data de Entrada</th>
                                        <th>Cursos Terminados</th>
                                        <th>Estado</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $value)
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="#">{{$value->nome}}</a>
                                            </h2>
                                        </td>
                                        <td>{{$value->created_at}}</td>

                                        <td>null</td>

                                        <td>
                                            {{ optional($value->status)->nome}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection