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
            @include('cursos.navbar')
            <!-- / Profile Sidebar -->

            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-body pt-0">
                        <!-- Tab Menu -->
                        <nav class="user-tabs mb-4">
                            <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#pat_appointments" data-toggle="tab">Avaliaçao 1 Resultado</a>
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
                                            <?php $i = 1 ?>
                                            <table class="table table-hover table-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Data de Entrada:</th>
                                                        <td>{{ $test->created_at }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Resultado Final:</th>
                                                        <td>{{ $test->result }}/20</td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div class="table-responsive">
                                            <?php $i = 1 ?>
                                            <table class="table table-hover table-center mb-0">
                                                <thead>

                                                </thead>
                                                <tbody>
                                                    @foreach($results as $result)
                                                    <tr class="test-option{{ $result->correct ? '-true' : '-false' }}">
                                                        <th style="width: 10%">Question #{{ $i }}</th>
                                                        <th>{{ $result->question->question_text }}</th>
                                                    </tr>
                                                    <!-- if ($result->question->code_snippet != '')
                                                    <tr>
                                                        <td>Code snippet</td>
                                                        <td>
                                                            <div class="code_snippet">{ $result->question->code_snippet }</div>
                                                        </td>
                                                    </tr>
                                                    endif -->
                                                    <tr>
                                                        <td><strong>Opçoes</strong></td>
                                                        <td>
                                                            <ul>
                                                                @foreach($result->question->options as $option)
                                                                <li style="@if ($option->correct == 1) font-weight: bold; @endif
                                        @if ($result->option_id == $option->id) text-decoration: underline @endif">{{ $option->option }}
                                                                    @if ($option->correct == 1) <em>(resposta correcta)</em> @endif
                                                                    @if ($result->option_id == $option->id) <em>(tua resposta)</em> @endif
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Sobre a resposta</strong></td>
                                                        <td>
                                                            {{ $result->question->answer_explanation }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Leia mais em:</strong></td>
                                                        <td>
                                                            @if ($result->question->more_info_link != '')
                                                            <a href="{{ $result->question->more_info_link }}" target="_blank">{{ $result->question->more_info_link }}</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <?php $i++ ?>
                                                    @endforeach
                                                </tbody>
                                                <!-- <tfoot>
                                                    <tr>
                                                        <td>
                                                            <a href="{{url('home')}}" class="btn btn-primary">Voltar aos modulos</a>
                                                            <button name="submit" value="Submeter" class="btn btn-success">Submeter</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                </tfoot> -->
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