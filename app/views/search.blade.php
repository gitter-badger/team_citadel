@extends('master')
@section('header')
    <h1 class="text-center">Cards <small>- Search Results for {{{ $query }}}</small></h1>
@stop

@section('content')
    <div class="row">
        <div role="tabpanel">
            <!-- Search results game tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#ws" aria-controls="weiss-schwarz" role="tab" data-toggle="tab">Weiss Schwarz</a></li>
                <li><a href="#mtg" aria-controls="magic-the-gathering" role="tab" data-toggle="tab">Magic The Gathering</a></li>
            </ul>
        </div>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="ws">
                <br>
                @if($wsCards != null)
                    @foreach($wsCards as $wsCard)
                        <div class="col-xs-6 col-sm-3 col-md-2">
                            <a href="{{{ $wsCard->url }}}" title="{{{ $wsCard->name . " " . $wsCard->rarity }}}">
                                <div class="img_wrapper_cards">
                                    <img class="center-block" src="{{ $wsCard->getMediumImageURL() }}" width="90%" onload="imgLoaded(this)">
                                </div>
                            </a>
                            <p class="text-center series-card-name">
                                {{ $wsCard->name . " " . $wsCard->rairty }}
                            </p>
                        </div>
                    @endforeach
                @endif
                <div class="text-center">
                    @if($query)
                        {{ $wsCards->appends(['query' =>  $query ])->links() }}
                    @endif
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="mtg">
                <div class="row">
                    <br>
                    @if($mtgCards != null)
                        @foreach($mtgCards as $mtgCard)
                            <div class="col-xs-6 col-sm-3 col-md-2">
                                <a href="{{{ $mtgCard->url }}}" title="{{{ $mtgCard->name . " " . $mtgCard->rarity }}}">
                                    <div class="img_wrapper_cards">
                                        <img class="center-block" src="{{ $mtgCard->getMediumImageURL() }}" width="90%" onload="imgLoaded(this)">
                                    </div>
                                </a>
                                <p class="text-center series-card-name">
                                    {{ $mtgCard->name . " " . $mtgCard->rairty }}
                                </p>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="row">
                <div class="text-center">
                    @if($query)
                        {{ $mtgCards->appends(['query' =>  $query ])->links() }}
                    @endif
                </div>
            </div>
        </div>   
    </div>
@stop

@section('scripts')
    @parent
    <script type="text/javascript">
        function imgLoaded(img) {
            var imgWrapper = img.parentNode;
            imgWrapper.className += imgWrapper.className ? ' loaded' : 'loaded';
        };
    </script>
    <script type="text/javascript">
        $(document).ready(function($) {
            function activateTab(tab){
                $('.nav-tabs a[href="#' + tab + '"]').tab('show');
            };
        });
    </script>
@stop