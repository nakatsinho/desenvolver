@extends('admin.layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-7 col-auto">
                    <h3 class="page-title">Material & Documentos</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Inicio</a></li>
                        <li class="breadcrumb-item active">Material & Documentos</li>
                    </ul>
                </div>
                <div class="col-sm-5 col">
                    <a href="{{ route('admin.ficha.create') }}" class="btn btn-primary float-right mt-2">Adicionar</a>
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
                                        <th>Nome do Ficheiro</th>
                                        <th>Modulo</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($fichas as $value)
                                    <tr>
                                        <td>#{{$value->id}}</td>

                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="#">{{$value->nome}}</a>
                                            </h2>
                                        </td>
                                        <td>{{$value->modulos->nome}}</td>
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
<!-- Edit Details Modal -->
<div class="modal fade" id="edit_specialities_details" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Ficheiro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row form-row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Specialities</label>
                                <input type="text" class="form-control" value="Cardiology">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control">
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
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