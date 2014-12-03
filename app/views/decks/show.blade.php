@extends('master')

    @section('header')
    @stop

    @section('content')
        {{ Form::open(['route' => 'addCard']) }}

                <div class="form-group">
                    <div class="well">
                        {{ Form::label('Cards') }}
                        <input type="text" id="searchbox" name="q" placeholder="Search Cards for your Deck..." class="form-control"></input>
                    </div>
                </div>

        {{ Form::close() }}
    @stop

    @section('scripts')
        @parent
        <script type="text/javascript" src="{{asset('js/input-select-dropdown.js')}}"></script>
        <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/selectize.js/0.11.2/js/standalone/selectize.js"></script>
    @stop