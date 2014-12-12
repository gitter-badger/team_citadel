@extends('master')
@section('header')
    <h1 class="text-center">Cards <small>- Search Results for {{{ $query }}}</small></h1>
@stop

@section('content')
    <div class="row">
        @if($cards != null)
            @foreach($cards as $card)
                <div class='col-xs-6 col-sm-3 col-md-2'>
                    <a href="{{ $card->url }}" title="{{{ $card->name  . " " . $card->rarity }}}">
                        <div class="img_wrapper_cards">
                            <img class="image-responsive center-block" src="{{ $card->getMediumImageURL() }}" width="90%" onload="imgLoaded(this)">
                        </div>
                    </a>
                    <p class="text-center series-card-name">
                        {{ $card->name  . " " . $card->rarity }}
                    </p>
                    <br>
                </div>
            @endforeach
        @endif
    </div>
    <div class="row">
        <div class="text-center">
            @if($query)
                {{ $cards->appends(['query' =>  $query ])->links() }}
            @endif
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
@stop