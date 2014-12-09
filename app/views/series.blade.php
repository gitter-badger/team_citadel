@extends('master')
@section('header')
    <h1 class="text-center">Weiβ Schwarz <small>- Series</small></h1>
@stop
@section('content')
    <div class='row'>
        @foreach($series as $aSeries)
            <div class='col-xs-12 col-sm-2'>
                <div style="min-height:160px">
                    <a class="series-box" href="{{ $aSeries->url }}">
                        <img class="series-images image-responsive center-block" src="{{ asset('images/series/'. $aSeries->id . '.jpg') }}" width="90%">
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