@extends('admin.layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-7 col-auto">
                    <h3 class="page-title">Todos Cursos</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Inicio</a></li>
                        <li class="breadcrumb-item active">Cursos</li>
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
                                        <th>#</th>
                                        <th>Nome do Curso</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cursos as $curso)
                                    <tr>
                                        <td>#{{$curso->id}}</td>

                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="#" class="avatar avatar-sm mr-2">
                                                    <img class="avatar-img" src="{{url('adminn/assets/img/courses/',$curso->foto)}}" alt="Cursos">
                                                </a>
                                                <a href="#">{{$curso->nome}}</a>
                                            </h2>
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