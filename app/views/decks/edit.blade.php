@extends('master')

@section('header')
    @if($method == 'create')
        <h2 class="text-center">Create Deck</h2>
    @elseif ($method == 'edit')
        <h2 class="text-center">Edit Your Deck</h2>
    @else
        <h2 class="text-center">Delete Deck</h2>
    @endif
@stop

@section('content')
    <div class="col-md-6 col-md-offset-3">
        @if($method == 'create')
            {{ Form::model($deck, ['route' => 'deck.store']) }}
        @elseif($method == 'edit')
            {{ Form::model($deck, ['route' => 'deck.edit']) }}
        @else
            {{ Form::model($deck, ['route' => 'deck.delete']) }}
        @endif
            {{ Form::token() }}

            @if($method == 'create')
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            {{ Form::label('Game') }}
                        </div>
                        <div class="col-md-9">
                            {{ Form::select('game_id', $games, null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                </div>

            @else
                {{ Form::hidden('deck', $deck->id) }}
            @endif

            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        {{ Form::label('title', 'Title')}}
                    </div>
                    <div class="col-md-9">
                        {{ Form::text('title', $deck->title, ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        {{ Form::label('description', 'Description') }}
                    </div>
                    <div class="col-md-9">
                        {{ Form::textarea('description', $deck->description, ['class' => 'form-control']) }}
                        @if($method == 'create')
                            {{ Form::submit('Create Deck', ['class' => 'btn btn-custom btn-md btn-block post-border'])}}
                        @elseif($method == 'edit')
                            {{ Form::submit('Update Deck', ['class' => 'btn btn-custom btn-md btn-block post-border'])}}
                        @endif
                            {{ Form::submit('Delete Deck', ['class' => 'btn btn-danger btn-md btn-block post-border'])}}
                    </div>
                </div>
            </div>
        {{ Form::close() }}
    </div>
@stop

@section('scripts')
    @parent
@stop