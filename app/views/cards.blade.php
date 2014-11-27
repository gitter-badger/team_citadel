@extends('master')
@section('header')
    <h1 class="text-center">Weiβ Schwarz <small>- {{ $aSeries->name }}</small></h1>
@stop
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <ol class="breadcrumb">
                <li><a href="{{ URL::route('series.index') }}">Series</a></li>
                <li><a href="{{ $aSeries->url }}">{{ $aSeries->name }}</a></li>
            </ol>
        </div>
    </div>
    <div class='row'>
        @foreach($aSeriesCards as $card)
            <div class='col-sm-2 col-xs-12'>
                <a href="{{ $card->url }}">
                    <div style="min-height: 200px">
                        <img class="series-images image-responsive center-block" src="{{ asset('images/cards/'. $card->id . '.jpeg') }}" width="90%">
                    </div>
                    <p class="text-center series-card-name">
                        {{ $card->name }}
                    </p>
                </a>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-sm-12">
            {{ $aSeriesCards->links() }}
        </div>
        
    </div>
@stop