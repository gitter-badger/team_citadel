@extends('master')
@section('content')
    <div class="row">
        <div class="page-header">
            <h1>Weiβ Schwarz <small>- Series</small></h1>
        </div>
    </div>
    <div class='row'>
        @foreach($series as $aSeries)
            <div class='col-sm-3 col-xs-12'>
                <a href="{{ $aSeries->url }}">
                    <img class="series-images image-responsive center-block" src="{{ asset('images/series/'. $aSeries->id . '.jpeg') }}" width="90%">
                    <h5 class='text-center series-card-img'>
                        {{ $aSeries->name }}
                    </h5>
                </a>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4"> 
            {{ $series->links() }}
        </div>
    </div>
@stop