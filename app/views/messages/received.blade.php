@extends('master')

    @section('header')
        @if($method == 'received')
            <h2 class="text-center">Received Messages</h2>
        @endif
    @stop

    @section('content')

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
    @stop

    @section('scripts')
        @parent
    @stop