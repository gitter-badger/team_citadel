@extends('master')
@section('content')
<div class="row">
    <div class="page-header text-center">
        <h1>Weiβ Schwarz <small>- Series</small></h1>
    </div>
</div>
@foreach(array_chunk($cards->all(), 6) as $sixCards)
    <div class='row'>
        @foreach($sixCards as $card)
            <div class='col-sm-2 col-xs-12'>
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