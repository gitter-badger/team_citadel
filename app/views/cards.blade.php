@extends('master')
@section('header')
    <h1 class="text-center">{{ $aSeries->game->name }} <small>- {{ $aSeries->name }}</small></h1>
@stop
@section('content')
    <div class="row">
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
    <div class='row'>
        <table class="table table-hover">
            @if($aSeries->game->name == 'Weiss Schwarz')
            <tr>
                <th class="cards-col-width">Images</th>
                <th class="vert-align text-center">Name</th>
                <th class="vert-align text-center">Type</th>
                <th class="vert-align text-center">Colour</th>
                <th class="vert-align text-center">Rarity</th>
                <th class="vert-align text-center">Lowest</th>
            </tr>
            @elseif($aSeries->game->name == 'Magic The Gathering')
            <tr>
                <th class="cards-col-width">Images</th>
                <th class="vert-align text-center">Name</th>
                <th class="vert-align text-center">Type</th>
                <th class="vert-align text-center">Cost</th>
                <th class="vert-align text-center">Rarity</th>
                <th class="vert-align text-center">Lowest</th>
            </tr>
            @endif
            @foreach($aSeries->cards as $card)
                @if($card->series->game->name == 'Weiss Schwarz')
                <tr class="clickable-row" href="{{ $card->url }}">
                    <td>
                         <div class="img_wrapper_cards center-block">
                            <img class="img-responsive" src="{{ $card->getSmallImageURL() }}" onload="imgLoaded(this)">
                         </div>
                    </td>
                    <td class="vert-align text-center">{{ $card->name }}</td>
                    <!-- Get card type attribute -->
                    <td class="vert-align text-center">{{ $card->attributes->find(4)->pivot->value }}</td>
                    <!-- Get card colour attribute -->
                    <td class="vert-align text-center">{{ $card->attributes->find(5)->pivot->value }}</td>
                    <td class="vert-align text-center">{{ $card->rarity }}</td>
                    <td class="vert-align text-center">$0.00</td>
                </tr>
                @elseif($card->series->game->name == 'Magic The Gathering')
                    <tr class="clickable-row" href="{{ $card->url }}">
                        <td >
                            <div class="img_wrapper_cards center-block">
                                <img class="img-responsive" src="{{ $card->getSmallImageURL() }}" onload="imgLoaded(this)"></td>
                            </div>
                        <td class="vert-align text-center">{{ $card->name }}</td>
                        <!-- Get card type color -->
                        <td class="vert-align text-center">{{ $card->attributes->find(4)->pivot->value }}</td>
                        <!-- Get card cost attribute -->
                        @if($card->attributes->find(11))
                            <td class="vert-align text-center">{{ $card->attributes->find(11)->pivot->value }}</td>
                        @else
                            <td class="vert-align text-center">N/A</td>
                        @endif
                        <td class="vert-align text-center">{{ $card->rarity }}</td>
                        <td class="vert-align text-center">$0.00</td>
                    </tr>
                @endif
            @endforeach
        </table>
    </div>
@stop
@section('scripts')
    @parent
    <script type="text/javascript">
        $(document).ready(function($) {
              $(".clickable-row").click(function() {
                    window.document.location = $(this).attr("href");
              });
        });
    </script>
@stop