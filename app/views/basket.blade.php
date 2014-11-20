@extends('master')

@section('header')
<h2> Shopping Basket <h2>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">

        </div>
    </div>
@stop

@section('scripts')
    @parent
    <script type="text/javascript" src="{{asset('js/validation.js')}}"></script>
@stop
