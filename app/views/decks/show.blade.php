@extends('master')

    @section('header')
    @stop

    @section('content')
        {{{ var_dump($cards) }}}
    @stop

    @section('scripts')
        @parent
        <script type="text/javascript" src="{{asset('js/carousel.js')}}"></script>
    @stop