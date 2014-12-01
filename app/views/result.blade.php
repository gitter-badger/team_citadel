@extends('master')
@section('header')
    <h1 class="text-center">Weiβ Schwarz <small>- Search Results for {{{ $query }}}</small></h1>
@stop
@section('content')
    @foreach($cards as $card)
        <div class='col-sm-2 col-xs-12'>
            <a href="{{ $card->url }}" title="{{{ $card->name  . " " . $card->rarity }}}">
                <div style="min-height: 200px">
                    <!-- if image exists, show it, else show back of card -->
                    @if(file_exists('public/images/cards/'. str_replace('/', '-', $card->serial_number) . '-' . $card->rarity . '.jpg'))
                        <img class="image-responsive center-block" src="{{ asset('images/cards/'. str_replace('/', '-', $card->serial_number) . '-' . $card->rarity . '.jpg') }}" width="90%">
                    @else
                        <img class="image-responsive center-block" src="{{ asset('images/cards/back.jpg') }}" width="90%">
                    @endif
                </div>
                <p class="text-center series-card-name">
                    {{ $card->name  . " " . $card->rarity }}
                </p>
            </a>
        </div>
    @endforeach
@stop