@extends('master')
@section('header')
    <h1 class="text-center">Magic The Gathering <small>- Sets</small></h1>
@stop
@section('content')
    <div class='row'>
        @foreach($series as $aSeries)
            @if(count($aSeries->cards->all()) > 0)
                <div class='col-xs-12 col-sm-2'>
            @else
                <div class='col-xs-12 col-sm-2 disabled'>
            @endif
                <div style="min-height:160px">
                    <a class="series-box" href="{{ $aSeries->url }}">
                        <img class="series-images image-responsive center-block" src="{{ $aSeries->getLargeImageURL() }}" width="90%" onload="imgLoaded(this)">
                    </a>
                    <h5 class='text-center series-card-name' title="{{{ $aSeries->name }}}">
                        {{ $aSeries->name }}
                    </h5>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-sm-12 text-center">
            {{ $series->links() }}
        </div>
    </div>
@stop