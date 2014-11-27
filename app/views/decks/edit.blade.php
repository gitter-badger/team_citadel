@extends('master')

    @section('header')
        @if($method == 'create')
            <h2 class="text-center">Create Deck</h2>
        @endif
    @stop

    @section('content')

        {{ Form::model($deck, ['route' => 'postDeck']) }}

            {{ Form::token() }}
            {{ Form::label('Game') }}
            {{ $deck->games }}
            <div class="form-group">
                <div class="row">
                    <div class="col-md-1">
                        {{ Form::label('title', 'Title')}}
                    </div>
                    <div class="col-md-6">
                        {{ Form::text('title') }}
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="row">
                    <div class="col-md-1">
                        {{ Form::label('description', 'Description')}}
                    </div>
                    <div class="col-md-6">
                        {{ Form::text('description') }}
                    </div>
                </div>
            </div>

            {{ Form::submit('Create Deck')}}

        {{ Form::close() }}
    @stop

    @section('scripts')
        @parent
    @stop