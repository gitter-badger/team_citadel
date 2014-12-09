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
            @if($card->series->game->name == 'Weiss Schwarz')
                <div class='col-xs-6 col-sm-3 col-md-2'>
                    <a href="{{ $card->url }}" title="{{{ $card->name  . " " . $card->rarity }}}">
                        @if(file_exists(public_path() . '/images/cards/'. str_replace('/', '-', $card->serial_number) . '-' . $card->rarity . '.jpg'))
                            <div class="img_wrapper">
                                <img class="image-responsive center-block" src="{{ asset('images/cards/'. str_replace('/', '-', $card->serial_number) . '-' . $card->rarity . '.jpg') }}" width="90%" onload="imgLoaded(this)">
                            </div>
                        @else
                            <div class="img_wrapper">
                                <img class="image-responsive center-block" src="http://approachphase.files.wordpress.com/2013/05/148lwsm.png" width="90%" onload="imgLoaded(this)">
                            </div>
                        @endif
                    </a>
                    <p class="text-center series-card-name">
                        {{ $card->name  . " " . $card->rarity }}
                    </p>
                    <br>
                </div>
            @elseif($card->series->game->name == 'Magic The Gathering')
                <div class='col-xs-6 col-sm-3 col-md-2'>
                    <a href="{{ $card->url }}" title="{{{ $card->name  . " " . $card->rarity }}}">
                        <div class="img_wrapper">
                            <img class="image-responsive center-block" src="{{ ('http://mtgimage.com/set/' . $card->serial_number . '/' . $card->attributes->find(17)->pivot->value . '.jpg') }}" width="90%" onload="imgLoaded(this)">
                        </div>
                    </a>
                    <p class="text-center series-card-name">
                        {{ $card->name  . " " . $card->rarity }}
                    </p>
                    <br>
                </div>
            @endif
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