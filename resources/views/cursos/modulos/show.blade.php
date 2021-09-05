@extends('layouts.app2')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">

                <h2 class="breadcrumb-title">Curso de {{$nome->nome}}</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->
<!-- Page Content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="chat-window">
                    <!-- Chat Left -->
                    <div class="chat-cont-left">
                        <div class="chat-header">
                            <span>{{$nome->nome}}</span>
                        </div>
                        <div class="chat-users-list">
                            <div class="chat-scroll">
                                <div class="media-body ">
                                    <div>
                                        <!-- <div class="user-name"></div> -->
                                        <div id="sidebar-menu" class="sidebar-menu">
                                            <ul>
                                                @foreach($modulo as $val)
                                                <li class="submenu">
                                                    <a href="">{{$val->nome}}</a>
                                                    <ul>
                                                        <?php $nid = 1 ?>
                                                        @foreach($capitulos as $value)
                                                        <li class="submenu">
                                                            <a href="#"><i class="fe fe-document"></i> <span class="user-name">{{$nid}} - {{$value->nome}}</span> <span class="menu-arrow"></span></a>
                                                            <ul style="display: none;">
                                                                <li>
                                                                    <a href="{{ route('reading.show',1) }}">
                                                                        hm
                                                                    </a>
                                                                </li>
                                                                @if(!is_null(10))
                                                                <li>
                                                                    <a href="{{ route('ficha.show',1) }}">
                                                                        file
                                                                    </a>
                                                                </li>
                                                                @endif
                                                            </ul>
                                                        </li>
                                                        <?php $nid++ ?>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Chat Left -->

                    <!-- Chat Right -->
                    <div class="chat-cont-right">
                        <div class="chat-body">
                            <div class="chat-scroll">
                                <div class="container">
                                    @yield('lessons')
                                </div>
                            </div>
                        </div>
                        <div class="chat-footer">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <a href="#" class="btn btn-success left">Anterior </a>
                                </div>
                                <div class="input-group-append">
                                    <a href="#" class="btn btn-success">Proximo</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Chat Right -->

                </div>
            </div>
        </div>
        <!-- /Row -->

    </div>

</div>
<!-- /Page Content -->

@endsection