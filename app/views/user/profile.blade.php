@extends('master')
@section('header')
    <div class="row">
        <div class="col-md-4">
            <img class="img-thumbnail profile-img img-responsive center-block" src="{{ $user->image }}" width="50%">
        </div>
        <div class="col-md-8">
            <h3> {{{ $user->username }}} </h3>
            <small>Joined {{ $user->created_at->toFormattedDateString() }}</small>
            @if(Auth::check() && Auth::user()->id == $user->id)
                <a href="{{ route('edit.user', Auth::user()->username) }}">Edit <span class="glyphicon glyphicon-edit"></span></a>
            @endif
        </div>
    </div>
@stop
@section('content')
    <!-- Nav tabs -->
    <ul class="nav nav-tabs col-md-12" role="tablist">
        <li role="presentation" class="active"><a href="#wall-tab" role="tab" data-toggle="tab">Wall</a></li>
        @if(Auth::check())
            @if(Auth::user()->id == $user->id)
                <li role="presentation"><a href="#messages" role="tab" data-toggle="tab">Messages</a></li>
            @endif
        @endif
    </ul>
    <!-- Tab panes -->
    <div class="tab-content col-md-12">
        <div class="tab-pane active" id="wall-tab">
            @foreach($decks as $deck)
            <div class="row">
                <div class="col-md-12 user-post-border">
                    <span class="col-sm-3 col-md-2">
                        @if(sizeof($deck->cards) > 0)
                            <img class="responsive-image center-block" src="{{ $deck->cards->first()->getSmallImageURL() }}" width="70%">
                        @else
                            <img class="responsive-image center-block" src="http://www.stevescheese.com/wp-content/plugins/woocommerce/assets/images/placeholder.png" width="70%">
                        @endif
                    </span>
                    <a class="user-deck-title" href="{{ route('deck.show', [$deck->id]) }}">
                        <h4>{{{ ucwords($deck->title) }}}</h4>
                    </a>
                    <p>{{{ Str::limit($deck->description, 200) }}}</p>
                    <small>{{ $deck->updated_at->diffForHumans() }}</small>
                </div>
            </div>
        @endforeach
    </div>

    <div role="tabpanel" class="tab-pane" id="messages">
        <div class="row well post-border">
            <div class="col-md-3">
                <h4 class="text-center">
                    <a href="{{ URL::route('create.message') }}">
                        Create Message <icon class="glyphicon glyphicon-envelope"></icon>
                    </a>
                </h4>
            </div>
        </div>

        <ul class="nav nav-pills nav-stacked col-md-2">
            <li class="active"><a href="#tab_b" data-toggle="pill">Inbox</a></li>
            <li><a href="#tab_c" data-toggle="pill">Sent</a></li>
        </ul>

        <div class="tab-content col-md-10">
            <div class="tab-pane active" id="tab_b">
            @foreach($messages as $message)
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Inbox</h3>
                    </div>
                    <div class="panel-body">
                        <img class="img-square profile-img" src="{{ asset(  'images/users/' . $message->user->id . '.jpeg') }}">
                        <p>
                            @foreach($message->conversation->users as $repUser)
                                {{{ $repUser->username }}}
                            @endforeach
                        </p>
                        <p>{{{ $message->conversation->name }}}</p>
                        <p>{{{ $message->content }}}</p>
                        @if($message->conversation->created_at->diffInDays() > 30)
                            <p>{{ $message->conversation->created_at->toFormattedDateString() }}</p>
                            @else
                            <p>{{ $message->conversation->created_at->diffForHumans()}}</p>
                        @endif
                        <a href="{{{ URL::route('reply.message', $user->username) }}}" class="btn btn-info">Reply</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="tab-pane" id="tab_c">
            @foreach($conversations as $conversation)
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Sent</h3>
                </div>
                <div class="panel-body">
                    <img class="img-square profile-img" src="{{ asset(  'images/users/' . $conversation->users->first()->id . '.jpeg') }}">
                    <p>
                        @foreach($conversation->messages as $message)
                            {{{ $message->user->username }}}
                        @endforeach
                    </p>
                    <p>{{{ $conversation->name }}}</p>
                    <p>{{{ $conversation->messages->first()->content }}}</p>
                    @if($conversation->created_at->diffInDays() > 30)
                        <p>{{ $conversation->created_at->toFormattedDateString() }}</p>
                    @else
                        <p>{{ $conversation->created_at->diffForHumans() }}</p>
                    @endif
                    <a href="{{{ URL::route('reply.message', $message->user->username) }}}" class="btn btn-info">Reply</a>
                </div>
            </div>
            @endforeach
        </div>
        </div>
    </div>

    <div role="tabpanel" class="tab-pane" id="profile">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>Your Profile</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('scripts')
    @parent
    {{ HTML::script('js/validation.js') }}
@stop
