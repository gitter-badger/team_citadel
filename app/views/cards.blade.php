@extends('master')
@section('header')
    <h1 class="text-center">{{ $aSeries->game->name }} <small>- {{ $aSeries->name }}</small></h1>
@stop
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <ol class="breadcrumb">
                <li>
                    @if($aSeries->game->name == 'Weiss Schwarz')
                        <a href="{{ URL::route('games.show', 'WeissSchwarz') }}"> {{ $aSeries->game->name }} </a>
                    @elseif($aSeries->game->name == 'Magic The Gathering')
                        <a href="{{ URL::route('games.show', 'MagicTheGathering') }}"> {{ $aSeries->game->name }} </a>
                    @endif
                </li>
                <li class="active">{{ $aSeries->name }}</li>
            </ol>
        </div>
    </div>
    <div class='row'>
        @foreach($aSeriesCards as $card)
                <div class='col-xs-4 col-sm-3 col-lg-2'>
                    <a href="{{ $card->url }}" title="{{{ $card->name  . " " . $card->rarity }}}">
                        <div class="img_wrapper">
                            <img class="center-block" src="{{ $card->getSmallImageURL() }}" onload="imgLoaded(this)">
                        </div>
                    </a>
                    <p class="text-center series-card-name">
                        {{ $card->name  . " " . $card->rarity }}
                    </p>
                    <br>
                </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-sm-12 text-center">
            {{ $aSeriesCards->links() }}
        </div>
    </div>
@stop
@section('scripts')
    @parent
    <script type="text/javascript">
        function imgLoaded(img){
            var imgWrapper = img.parentNode;
            imgWrapper.className += imgWrapper.className ? ' loaded' : 'loaded';
        };
    </script>
@stop