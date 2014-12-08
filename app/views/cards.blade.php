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
            <div class='card col-xs-12 col-sm-2 col-md-2 col-lg-2'>
                <a href="{{ $card->url }}" title="{{{ $card->name  . " " . $card->rarity }}}">
                    <div style="min-height: 220px;">
                        @if($card->series->game->name == 'Weiss Schwarz')
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <!-- Front Content -->
                                        <img class="image-responsive center-block" src="http://approachphase.files.wordpress.com/2013/05/148lwsm.png" width="90%">
                                    </div>
                                    <div class="back">
                                        <!-- Back Content -->
                                        <!-- if image exists, show it, else show back of card -->
                                        @if(file_exists(public_path() . '/images/cards/'. str_replace('/', '-', $card->serial_number) . '-' . $card->rarity . '.jpg'))
                                            <img class="image-responsive center-block" src="{{ asset('images/cards/'. str_replace('/', '-', $card->serial_number) . '-' . $card->rarity . '.jpg') }}" width="90%">
                                            <p class="text-center series-card-name">
                                                {{ $card->name  . " " . $card->rarity }}
                                            </p>
                                        @else
                                            <img class="image-responsive center-block" src="http://approachphase.files.wordpress.com/2013/05/148lwsm.png" width="90%">
                                            <p class="text-center series-card-name">
                                                {{ $card->name  . " " . $card->rarity }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($card->series->game->name == 'Magic The Gathering')
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <!-- Front Content -->
                                        <img class="image-responsive center-block" src="http://mtgimage.com/card/cardback.hq.jpg" width="90%">
                                    </div>
                                    <div class="back">
                                        <!-- Back Content -->
                                        <img class="image-responsive center-block" src="{{ ('http://mtgimage.com/set/' . $card->serial_number . '/' . $card->attributes->find(17)->pivot->value . '.jpg') }}" width="90%">
                                        <p class="text-center series-card-name">
                                            {{ $card->name  . " " . $card->rarity }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </a>
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
        $(function() {
            $card = $('.card').first();
            setTimeout(function() {
                $card.find('.flip-container').addClass('hover');
                setInterval(function() {
                    $card = $card.next();
                    $card.find('.flip-container').addClass('hover');
                }, 300);
            }, 300);
        });
    </script>
@stop