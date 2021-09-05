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
                <h2 class="breadcrumb-title">Painel de Avaliaçao do Curso de {{ $curso->nome }}</h2>
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
            @include('cursos.navbar')
            <!-- / Profile Sidebar -->

            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-body pt-0">
                        <!-- Tab Menu -->
                        <nav class="user-tabs mb-4">
                            <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#pat_appointments" data-toggle="tab">Avaliaçao 1</a>
                                </li>
                            </ul>
                        </nav>
                        <!-- /Tab Menu -->
                        <!-- Tab Content -->
                        <div class="tab-content pt-0">
                            <!-- Appointment Tab -->
                            <div id="pat_appointments" class="tab-pane fade show active">
                                <div class="card card-table mb-0">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Avaliaçao Sumativa</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(count($questions) > 0)
                                                    <?php
                                                    // $ques = DB::table('questions')->select('topic_id')->first();
                                                    // $topic = DB::table('topics')->select('title')->where('id', $ques->topic_id)->first();
                                                    ?>
                                                    <?php $i = 1; ?>
                                                    @foreach($questions as $question)
                                                    <form role="form" method='POST' href="{{route('teste.store', $question->id)}}">
                                                        @method('PUT')
                                                        {{ csrf_field() }}
                                                        <tr>
                                                            <td>
                                                                <div class="panel panel-default">
                                                                    <div class="panel-body">
                                                                        <div class="row">
                                                                            <div class="col-xs-12 form-group">
                                                                                <div class="form-group">
                                                                                    <strong>Pergunta {{ $i }}.<br />{!! nl2br($question->question_text) !!}</strong>

                                                                                    @if ($question->code_snippet != '')
                                                                                    <div class="code_snippet">
                                                                                        <!-- { $question->code_snippet } -->
                                                                                    </div>
                                                                                    @endif

                                                                                    <input type="hidden" name="questions[{{ $i }}]" value="{{ $question->id }}">
                                                                                    @foreach($question->options as $option)
                                                                                    <br>
                                                                                    <label class="radio-inline">
                                                                                        <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option->id }}">
                                                                                        {{ $option->option }}
                                                                                    </label>
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php $i++; ?>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td>
                                                            <!-- <a href="{{url('home')}}" class="btn btn-primary">Voltar aos modulos</a> -->
                                                            <button name="submit" value="Submeter" class="btn btn-success">Submeter</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Appointment Tab -->

                            <!-- Prescription Tab -->
                            <div class="tab-pane fade" id="pat_prescriptions">
                                <div class="card card-table mb-0">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            ##
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