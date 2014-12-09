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
                            <img class="image-responsive center-block" src="{{ asset('images/cards/'. str_replace('/', '-', $card->serial_number) . '-' . $card->rarity . '.jpg') }}" width="90%">
                        @else
                             <img class="image-responsive center-block" src="{{ asset('images/cards/'. $card->series->game->id . '-' . 'back.jpg') }}" width="90%">
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
                         <img class="image-responsive center-block" src="{{ ('http://mtgimage.com/set/' . $card->serial_number . '/' . $card->attributes->find(17)->pivot->value . '.jpg') }}" width="90%">
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