@extends('master')
@section('header')
    <h1 class="text-center">Weiβ Schwarz <small>- Series</small></h1>
@stop
@section('content')
    <div class='row'>
        @foreach($series as $aSeries)
            <div class='col-xs-12 col-sm-2'>
                <a href="{{ $aSeries->url }}" title="{{{ $aSeries->name }}}">
                    <div style="min-height:140px">
                        <img class="series-images image-responsive center-block" src="{{ asset('images/series/'. $aSeries->id . '.jpg') }}" width="90%">
                    </div>
                    <h5 class='text-center series-card-img'>
                        {{ $aSeries->name }}
                    </h5>
                </a>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-sm-12 text-center"> 
            {{ $series->links() }}
        </div>
    </div>
@stop