@extends('admin.layouts.app')

@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-7 col-auto">
                    <h3 class="page-title">Cadastro de Monitoria</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Painel de Controle</a></li>
                        <li class="breadcrumb-item active">Monitoria</li>
                    </ul>
                </div>
                <div class="col-sm-5 col">
                    <a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2">Adicionar</a>
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
                                        <th class="text-right">Acçao</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tutoria as $value)
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <!-- <a href="#" class="avatar avatar-sm mr-2">
                                                    <img class="avatar-img" src="assets/img/specialities/specialities-01.png" alt="Speciality">
                                                </a> -->
                                                <a href="#">{{$value->nome}}</a>
                                            </h2>
                                        </td>
                                        <td class="text-right">
                                            <div class="actions">
                                                <a class="btn btn-sm bg-success-light" data-toggle="modal" href="#edit_specialities_details">
                                                    <i class="fe fe-pencil"></i> Edit
                                                </a>
                                                <a data-toggle="modal" href="#delete_modal" class="btn btn-sm bg-danger-light">
                                                    <i class="fe fe-trash"></i> Delete
                                                </a>
                                            </div>
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
<!-- /Page Wrapper -->
<!-- Add Modal -->
<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Linkar-se ao curso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.tutoria.store') }}" method="POST" enctype="multipart/form-data" role="form">
                    @csrf
                    <div class="row form-row">
                        <div class="col-12 ">
                            <div class="form-group">
                                <label>Todos Cursos</label>
                                <select class="form-control select" name="curso_id">
                                    @foreach($cursos as $id=>$value)
                                    <option value="{{$id}}">{{$value}}</option>
                                    @endforeach
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
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
<!-- /ADD Modal -->

<!-- Edit Details Modal -->
<div class="modal fade" id="edit_specialities_details" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Specialities</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('admin.tutoria.store') }}" method="POST" enctype="multipart/form-data" role="form">
                    @csrf
                    <div class="row form-row">
                        <div class="col-12 ">
                            <div class="form-group">
                                <label>Todos Cursos</label>
                                <select class="form-control select" name="curso_id">
                                    @foreach($cursos as $id=>$value)
                                    <option value="{{$id}}">{{$value}}</option>
                                    @endforeach
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
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

<!-- Delete Modal -->
<div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!--	<div class="modal-header">
							<h5 class="modal-title">Delete</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>-->
            <div class="modal-body">
                <div class="form-content p-2">
                    <h4 class="modal-title">Delete</h4>
                    <p class="mb-4">Are you sure want to delete?</p>
                    <button type="button" class="btn btn-primary">Save </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Delete Modal -->
@endsection