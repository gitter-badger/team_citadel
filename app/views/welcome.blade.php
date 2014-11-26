@extends( 'master' )
@section('content')
    <div class="jumbotron" id="welcome-jumbotron">
      <h1 class="text-center">Welcome to Deck Citadel</h1>
      <p class="text-muted text-center">Deck Citadel is website that allows you to look at cards.</p>
    </div>

        <!-- Three columns of text below the carousel -->
        <div class="row">
            <div class="col-lg-4">
                {{ HTML::image('images/welcome/ws-welcome.jpg', 'Weiss Schwarz', array('class' => 'img-circle', 'width' => '124px', 'height' => '124px')) }}
                <h2>Weiß Schwarz</h2>
                <p>DWeiß Schwarz (ヴァイスシュヴァルツ) is a Japanese collectible card game created by Bushiroad. The game is separated into Weiß-side and Schwarz-side. Weiß and Schwarz are German for white and black, respectively. As a general rule, series under Weiß usually have better card effects when compared to those series under Schwarz. However, with the newer series entering the respective sides, there is not much difference between the two.</p>
                <p><a class="btn btn-default" href="{{ URL::route('series.index') }}" role="button">View cards »</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                {{ HTML::image('images/welcome/mtg-welcome.jpg', 'Magic the Gathering', array('class' => 'img-circle', 'width' => '124px', 'height' => '124px')) }}
                <h2>Magic The Gathering</h2>
                <p>Each game represents a battle between wizards known as "planeswalkers", who employ spells, artifacts, and creatures depicted on individual Magic cards to defeat their opponents. Although the original concept of the game drew heavily from the motifs of traditional fantasy role-playing games such as Dungeons & Dragons, the gameplay of Magic bears little similarity to pencil-and-paper adventure games, while having substantially more cards and more complex rules than many other card games.</p>
                <p><a class="btn btn-default" href="{{ URL::route('series.index') }}" role="button">View cards »</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                {{ HTML::image('images/welcome/pokemon-welcome.jpg', 'pokemon', array('class' => 'img-circle', 'width' => '124px', 'height' => '124px')) }}
                <h2>Pokémon</h2>
                <p>In this game, players take on the role of a Pokémon trainer, using their creatures to battle. Players play Pokémon to the field and use their attacks to reduce the opponent's HP. When a Pokémon's HP is reduced to 0 it is knocked out and the player who knocked it out takes a Prize card into their hand. A player may win the game in three ways: by collecting all of their prize cards (initially six, but some cards can increase this), if their opponent runs out of Pokémon on the field, or if at the beginning of their opponent's turn there are no cards left to draw in the opponent's deck.</p>
                <p><a class="btn btn-default" href="{{ URL::route('series.index') }}" role="button">View cards »</a></p>
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->


        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <!-- CARD DATABASE -->
        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">Card <span class="text-muted">Database</span></h2>
                <p class="lead">Card lookup including translations.</p>
            </div>
            <div class="col-md-5">
                <!-- TODO: get screenshot of the WS series list page -->
                <img class="featurette-image img-responsive" data-src="holder.js/500x500/auto" alt="500x500" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNTAwIiBoZWlnaHQ9IjUwMCIgdmlld0JveD0iMCAwIDUwMCA1MDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iNTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjE5MC4zMTI1IiB5PSIyNTAiIHN0eWxlPSJmaWxsOiNBQUFBQUE7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LWZhbWlseTpBcmlhbCwgSGVsdmV0aWNhLCBPcGVuIFNhbnMsIHNhbnMtc2VyaWYsIG1vbm9zcGFjZTtmb250LXNpemU6MjNwdDtkb21pbmFudC1iYXNlbGluZTpjZW50cmFsIj41MDB4NTAwPC90ZXh0PjwvZz48L3N2Zz4=" data-holder-rendered="true">
            </div>
        </div>

        <hr class="featurette-divider">

        <!-- CARD MARKETPLACE -->
        <div class="row featurette">
            <div class="col-md-5">
                <!-- TODO: get screenshot of the WS listings -->
                <img class="featurette-image img-responsive" data-src="holder.js/500x500/auto" alt="500x500" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNTAwIiBoZWlnaHQ9IjUwMCIgdmlld0JveD0iMCAwIDUwMCA1MDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iNTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjE5MC4zMTI1IiB5PSIyNTAiIHN0eWxlPSJmaWxsOiNBQUFBQUE7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LWZhbWlseTpBcmlhbCwgSGVsdmV0aWNhLCBPcGVuIFNhbnMsIHNhbnMtc2VyaWYsIG1vbm9zcGFjZTtmb250LXNpemU6MjNwdDtkb21pbmFudC1iYXNlbGluZTpjZW50cmFsIj41MDB4NTAwPC90ZXh0PjwvZz48L3N2Zz4=" data-holder-rendered="true">
            </div>
            <div class="col-md-7">
                <!-- TODO: Link to marketplace -->
                <h2 class="featurette-heading">Card <span class="text-muted">Marketplace</span></h2>
                <p class="lead">Buy and sell cards.</p>
            </div>
        </div>
        <!-- /END THE FEATURETTES -->
@stop