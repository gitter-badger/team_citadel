@extends('master')

    @section('header')
        @if($method == 'create')
            <h2 class="text-center">Create Deck</h2>
        @endif
    @stop

    @section('content')

        <div class="col-md-6 col-md-offset-3">
            {{ Form::model($deck, ['route' => 'postDeck']) }}

                {{ Form::token() }}

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
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            {{ Form::label('title', 'Title')}}
                        </div>
                        <div class="col-md-9">
                            {{ Form::text('title', '', ['class' => 'form-control']) }}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            {{ Form::label('description', 'Description') }}
                        </div>
                        <div class="col-md-9">
                            {{ Form::textarea('description', '', ['class' => 'form-control']) }}
                            {{ Form::submit('Create Deck', ['class' => 'btn btn-custom btn-md btn-block post-border'])}}
                        </div>
                    </div>
                </div>



            {{ Form::close() }}
        </div>
    @stop

    @section('scripts')
        @parent
    @stop