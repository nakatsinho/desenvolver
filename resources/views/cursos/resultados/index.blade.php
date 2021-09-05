@extends('layouts.app')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Avaliaçoes Praticas</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Painel de Avaliaçao</h2>
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
            <!-- / Profile Sidebar -->

            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-body pt-0">
                        <!-- Tab Menu -->
                        <nav class="user-tabs mb-4">
                            <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link" href="#pat_prescriptions" data-toggle="tab">Meus Resultados (Clique aqui)</a>
                                </li>
                            </ul>
                        </nav>
                        <!-- /Tab Menu -->
                        <!-- Tab Content -->
                        <div class="tab-content pt-0">

                            <!-- Prescription Tab -->
                            <div class="tab-pane fade" id="pat_prescriptions">
                                <div class="card card-table mb-0">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <section class="section-table cid-rFvrJcFT2l" id="table1-s">
                                                <div class="container container-table">
                                                    <h3 class="page-title">Listagem de todos meus resultados</h3>

                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            Lista de Resultados
                                                        </div>

                                                        <div class="panel-body">
                                                            <table class="table table-bordered table-striped {{ count($results) > 0 ? 'datatable' : '' }}">
                                                                <thead>
                                                                    <tr>
                                                                        @if(Auth::user()->role_id==2)
                                                                        <th>Nome do Aluno:</th>
                                                                        @endif
                                                                        <th>Data de Entrada:</th>
                                                                        <th>Result</th>
                                                                        <th>&nbsp;</th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody>
                                                                    @if (count($results) > 0)
                                                                    @foreach ($results as $result)
                                                                    <tr>
                                                                        @if(Auth::user()->role_id==2)
                                                                        <?php $users = DB::table('users')->select('nome', 'email')->where('id', $result->user_id)->get(); ?>
                                                                        @foreach($users as $value)
                                                                        <td>{{ $value->nome }} ({{ $value->email }})</td>
                                                                        @endforeach
                                                                        @endif
                                                                        <td>{{ $result->created_at }}</td>
                                                                        <td>{{ $result->result }}/10</td>
                                                                        <td>
                                                                            <a href="{{ route('resultados.show',[$result->id]) }}" class="btn btn-xs btn-primary">Visualizar</a>
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach
                                                                    @else
                                                                    <tr>
                                                                        <td colspan="6">Sem resultados na tabela!</td>
                                                                    </tr>
                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Prescription Tab -->

                            <!-- Medical Records Tab -->
                            <div id="pat_medical_records" class="tab-pane fade">
                                <div class="card card-table mb-0">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            ###
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Medical Records Tab -->

                            <!-- Billing Tab -->
                            <div id="pat_billing" class="tab-pane fade">
                                <div class="card card-table mb-0">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            ####
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Billing Tab -->
                        </div>
                        <!-- Tab Content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Page Content -->

@endsection