@extends('layouts.app2')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="chat-window">

                    <!-- Chat Left -->
                    <div class="chat-cont-left">
                        <div class="chat-header">
                            <span>Chats</span>
                            <a href="javascript:void(0)" class="chat-compose">
                                <i class="material-icons">control_point</i>
                            </a>
                        </div>
                        <form class="chat-search">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <i class="fas fa-search"></i>
                                </div>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                        </form>
                        <div class="chat-users-list">
                            <div class="chat-scroll">
                                @if($users)
                                @forelse($users as $value)
                                <a href="javascript:void(0);" class="media">
                                    <div class="media-img-wrap">
                                        <div class="avatar avatar-away">
                                            <img src="{{ url('adminn/assets/img/users/',$value->foto) }}" alt="User Image" class="avatar-img rounded-circle">
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div>
                                            <div class="user-name">{{ $value->nome }} {{ $value->sobrenome }}</div>
                                            <div class="user-last-chat">Hey, How are you?</div>
                                        </div>
                                        <div>
                                            <div class="last-chat-time block">2 min</div>
                                            <div class="badge badge-success badge-pill">15</div>
                                        </div>
                                    </div>
                                </a>
                                @empty
                                <p>
                                <h3 class="text-center" style="color:red">Nenhum Estudante Activo!</h3>
                                </p>
                                @endforelse
                                @endif
                                <!-- <a href="javascript:void(0);" class="media read-chat active">
                                    <div class="media-img-wrap">
                                        <div class="avatar avatar-online">
                                            <img src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image" class="avatar-img rounded-circle">
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div>
                                            <div class="user-name">Dr. Darren Elder</div>
                                            <div class="user-last-chat">I'll call you later </div>
                                        </div>
                                        <div>
                                            <div class="last-chat-time block">8:01 PM</div>
                                        </div>
                                    </div>
                                </a> -->
                            </div>
                        </div>
                    </div>
                    <!-- /Chat Left -->

                    <!-- Chat Right -->
                    <div class="chat-cont-right">
                        <div class="chat-header">
                            <a id="back_user_list" href="javascript:void(0)" class="back-user-list">
                                <i class="material-icons">chevron_left</i>
                            </a>
                            <div class="media">
                                <div class="media-img-wrap">
                                    <div class="avatar avatar-online">
                                        <img src="{{ url('adminn/assets/img/users/',Auth::user()->foto) }}" alt="User Image" class="avatar-img rounded-circle">
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="user-name">Dr. Darren Elder</div>
                                    <div class="user-status">online</div>
                                </div>
                            </div>
                            <div class="chat-options">
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#voice_call">
                                    <i class="material-icons">local_phone</i>
                                </a>
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#video_call">
                                    <i class="material-icons">videocam</i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="material-icons">more_vert</i>
                                </a>
                            </div>
                        </div>
                        <div class="chat-body">
                            <div class="chat-scroll">
                                <ul class="list-unstyled">
                                    @if (!$statuses->count())
                                    <li>
                                        <div class="media-body">
                                            <p>Sem nada na sua linha de tempo ainda...</p>
                                        </div>
                                    </li>
                                    @else
                                    <li class="chat-date">Hoje</li>
                                    @foreach ($statuses as $value)
                                    <li class="media sent">
                                        <div class="media-body">
                                            <div class="msg-box">
                                                <div>
                                                    <p>{{ $value->body }}</p>
                                                    <ul class="chat-msg-info">
                                                        <li>
                                                            <div class="chat-time">
                                                                <span>{{ $value->created_at->diffForHumans() }} </span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @foreach ($value->replies as $reply)
                                    <li class="media received">
                                        <div class="avatar">
                                            <img src="{{ url('adminn/assets/img/users/',$reply->user->foto) }}" alt="{{ $reply->user->getNameOrUsername() }}" class="avatar-img rounded-circle">
                                        </div>
                                        <div class="media-body">
                                            <div class="msg-box">
                                                <div>
                                                    <p>{{ $reply->body }}</p>
                                                    <ul class="chat-msg-info">
                                                        <li>
                                                            <div class="chat-time">
                                                                <span>{{ $reply->created_at->diffForHumans() }}</span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            @if(!is_null($reply->file))
                                            <div class="msg-box">
                                                <div>
                                                    <div class="chat-msg-attachments">
                                                        <div class="chat-attachment">
                                                            <img src="assets/img/img-02.jpg" alt="Attachment">
                                                            <div class="chat-attach-caption">{{ $reply->file }}</div>
                                                            <a href="#" class="chat-attach-download">
                                                                <i class="fas fa-download"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <ul class="chat-msg-info">
                                                        <li>
                                                            <div class="chat-time">
                                                                <span>{{ $reply->created_at->diffForHumans() }}</span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </li>
                                    @endforeach
                                    <li class="media sent">
                                        <form role="form" action="{{ route('status.reply', ['statusId' => $value->id]) }}" method="post">
                                            @csrf
                                            <div class="form-group{{ $errors->has("reply-{$value->id}") ? ' has-error': '' }}">
                                                <input name="reply-{{ $value->id }}" class="form-control" id="" placeholder="Comente aqui...">
                                                @if ($errors->has("reply-{$value->id}"))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first("reply-{$value->id}") }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-sm" value="Reply" hidden>Responder</button>
                                        </form>
                                    </li>
                                    @endforeach
                                    <li class="chat-date">Antigo</li>
                                    {{ $statuses->render() }}
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="chat-footer">
                            <div class="input-group">
                                <form action="{{ route('chat.store') }}" method="POST" role="form" class="input-group">
                                    @csrf
                                    <div class="input-group-prepend">
                                        <div class="btn-file btn">
                                            <i class="fa fa-paperclip"></i>
                                            <input type="file" name="file">
                                        </div>
                                    </div>
                                    <input type="text" name="status" class="input-msg-send form-control" placeholder="Comente algo {{ Auth::user()->getNameOrUsername() }}..." autofocus>
                                    @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                    @endif
                                    <div class="input-group-append">
                                        <button type="submit" class="btn msg-send-btn"><i class="fab fa-telegram-plane"></i></button>
                                    </div>
                                </form>
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
@endsection