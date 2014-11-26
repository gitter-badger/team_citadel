@extends('master')
@section('header')
    <h1 class="text-center">Weiβ Schwarz <small>- Series</small></h1>
@stop
@section('content')
    <div class='row'>
        @foreach($series as $aSeries)
            <div class='col-xs-12 col-sm-2'>
                <a href="{{ $aSeries->url }}">
                    <img class="series-images image-responsive center-block" src="{{ asset('images/series/'. $aSeries->id . '.jpg') }}" width="90%">
                    <h5 class='text-center series-card-img'>
                        {{ $aSeries->name }}
                    </h5>
                </a>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4"> 
            {{ $series->links() }}
        </div>
    </div>
@stop