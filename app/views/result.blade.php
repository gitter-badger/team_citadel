@extends('master')
@section('header')
    <h1 class="text-center">Weiβ Schwarz <small>- Search Results for {{{ $query }}}</small></h1>
@stop
@section('content')
    @if($cards != null)
        @foreach($cards as $card)
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
        @endforeach
    @endif
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