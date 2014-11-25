@extends('master')
@section('header')
    <h1 class="text-center">Weiβ Schwarz <small>- {{ $aSeries->name }}</small></h1>
@stop
@section('content')
    @foreach(array_chunk($aSeries->cards->all(), 12) as $twelveCards)
        <div class='row'>
            @foreach($twelveCards as $card)
                <div class='col-sm-1 col-xs-12'>
                    <a href="{{ $card->url }}">
                        <img class="series-images image-responsive center-block" src="{{ asset('images/cards/'. $card->id . '.jpeg') }}" width="90%">
                        <p class='text-center'>
                            {{ $card->name }}
                        </p>
                    </a>
                </div>
            @endforeach
        </div>
    @endforeach
@stop