@extends('master')
@section('content')
<!-- Nav tabs -->
<ul class="nav nav-tabs col-md-12" role="tablist">
    <li role="presentation" class="active"><a href="#wall-tab" role="tab" data-toggle="tab">Wall</a></li>
    @if(Auth::check())
        @if(Auth::user()->id == $user->id)
            <li role="presentation"><a href="#profile" role="tab" data-toggle="tab">Profile</a></li>
            <li role="presentation"><a href="#messages" role="tab" data-toggle="tab">Messages</a></li>
            <li role="presentation"><a href="#settings" role="tab" data-toggle="tab">Settings</a></li>
        @endif
    @endif
</ul>
<!-- Tab panes -->
<div class="tab-content col-md-12">
    <div class="tab-pane active" id="wall-tab">
        @if(Auth::check() && Auth::user()->id == $user->id)
            <div class="row well post-border">
                <div class="col-md-3">
                    <h4 class="text-center">
                        <a href="/decks/create">
                            Create Deck <icon class="glyphicon glyphicon-plus-sign"></icon>
                        </a>
                    </h4>
                </div>
            </div>
        @endif
        @foreach($decks as $deck)
            <div class="row">
                <div class="col-md-12 post-border">
                    <span class="col-sm-3 col-md-2">
                        <img class="responsive-image center-block" src="{{ $deck->cards->first()->getSmallImageURL() }}" width="70%">
                    </span>
                    <h4>{{{ ucwords($deck->title) }}}</h4> {{ link_to_route('deck.show', 'See full deck', [$deck->id]) }}
                    <p>{{{ $deck->description }}}</p>
                </div>
            </div>
        @endforeach
    </div>

    @if(Auth::check())
        @if(Auth::user()->id == $user->id)

        <div role="tabpanel" class="tab-pane" id="messages">
            <div class="row well post-border">
                <div class="col-md-3">
                    <h4 class="text-center">
                        <a href="/messages/create">
                            Create Message <icon class="glyphicon glyphicon-envelope"></icon>
                        </a>
                    </h4>
                </div>
            </div>

            <ul class="nav nav-pills nav-stacked col-md-2">
                <li><a href="#tab_b" data-toggle="pill">Inbox</a></li>
                <li><a href="#tab_c" data-toggle="pill">Sent</a></li>
                <li><a href="" data-toggle="pill">Deleted</a></li>
            </ul>

            <div class="tab-content col-md-10">
                <div class="tab-pane" id="tab_b">
                @foreach($messages as $message)
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Inbox</h3>
                    </div>
                    <div class="panel-body">
                        <p>
                @foreach($message->conversation->users as $user)
                    {{{ $user->username }}}
                @endforeach
                        </p>
                        <p>{{{ $message->conversation->name }}}</p>
                        <p>{{{ $message->content }}}</p>
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
                        <p>
                @foreach($conversation->messages as $message)
                    {{{ $message->user->username}}}
                @endforeach
                        </p>
                        <p>{{{ $conversation->name }}}</p>
                        <p> {{{ $conversation->messages()->orderBy('created_at', 'DESC')->get()->first()->content}}}</p>
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
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <img class="img-circle profile-img" src="{{ asset(  'images/users/' . $user->id . '.jpeg') }}">
                        </div>
                        <div class="col-md-6">
                            <h3> {{{ $user->username }}} </h3>
                            <table class="table table-hover">
                                <tr>
                                    <td>Title</td>
                                    <td>{{{ $user->title }}}</td>
                                </tr>
                                <tr>
                                    <td>Firstname</td>
                                    <td>{{{ $user->first_name }}}</td>
                                </tr>
                                <tr>
                                    <td>Lastname</td>
                                    <td>{{{ $user->last_name }}}
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{{ $user->email }}}
                                </tr>
                                <tr>
                                    <td>DOB</td>
                                    <td>{{{ $user->date_of_birth }}}
                                </tr>
                                <tr>
                                    <td>Location</td>
                                    <td>{{{ $user->location }}}</td>
                                </tr>
                            </table>
                            <a href="{{ route('edit.user', $user->username) }}" class="btn btn-custom btn-lg btn-block"> Edit</a>
                        </div>
                    </div>
                </div>
            </div>

        <div role="tabpanel" class="tab-pane" id="messages">Future Updates</div>
        <div role="tabpanel" class="tab-pane" id="settings">Future Updates</div>
    @endif
</div>
@stop
@section('scripts')
    @parent
    {{ HTML::script('js/validation.js') }}
@stop
