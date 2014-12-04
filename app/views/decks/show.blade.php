@extends('master')

    @section('header')
    @stop

    @section('content')
        {{ Form::open(['route' => ['addCard', $deck->id]]) }}

                <div class="form-group">
                    <div class="well">
                        <div class="row">
                            {{ Form::label('Cards') }}
                            {{ Form::text("q", "", ["class" => "form-control", "id" => 'searchbox', 'placeholder' => "Search Cards for your Deck..."]) }}
                            {{ Form::submit('Add Cards', ['class' => 'btn btn-primary pull-right']) }}
                        </div>
                    </div>
                </div>

        {{ Form::close() }}
    @stop

    @section('scripts')
        @parent
        {{ HTML::script('js/input-select-dropdown.js', ["type" => "text/javascript"]) }}
    @stop