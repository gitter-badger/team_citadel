@extends('master')

    @section('header')
        @if($method == 'sent')
            <h2 class="text-center">Sent Messages</h2>
        @endif
    @stop

    @section('content')

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
    @stop

    @section('scripts')
        @parent
    @stop