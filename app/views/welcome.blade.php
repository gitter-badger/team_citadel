@extends( 'master' )
@section('header')
  <h1 class="text-center">Welcome to Deck Citadel <br><small class="text-muted text-center">We have the cards you're looking for.</small></h1>
@stop
@section('content')
    <!-- Three columns of text below the carousel -->
    <div class="row">
        <div class="col-lg-4">
            <a href="{{ URL::route('series.index') }}">
                {{ HTML::image('images/welcome/ws-welcome.jpg', 'Weiss Schwarz', array('class' => 'img-circle center-block', 'width' => '124px', 'height' => '124px')) }}
            </a>
            <h2 class="text-center">Weiß Schwarz</h2>
            <p>Weiß Schwarz (ヴァイスシュヴァルツ) is a Japanese collectible card game created by Bushiroad. The game is separated into Weiß-side and Schwarz-side. Weiß and Schwarz are German for white and black, respectively. As a general rule, series under Weiß usually have better card effects when compared to those series under Schwarz. However, with the newer series entering the respective sides, there is not much difference between the two.</p>
            <p><a class="btn btn-default" href="{{ URL::route('series.index') }}" role="button">View cards »</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4 disabled">
            <a href="{{ URL::route('series.index') }}">
                {{ HTML::image('images/welcome/mtg-welcome.jpg', 'Magic the Gathering', array('class' => 'img-circle center-block', 'width' => '124px', 'height' => '124px')) }}
            </a>
            <h2 class="text-center">Magic The Gathering</h2>
            <p>Each game represents a battle between wizards known as "planeswalkers", who employ spells, artifacts, and creatures depicted on individual Magic cards to defeat their opponents. Although the original concept of the game drew heavily from the motifs of traditional fantasy role-playing games such as Dungeons & Dragons, the gameplay of Magic bears little similarity to pencil-and-paper adventure games, while having substantially more cards and more complex rules than many other card games.</p>
            <p><a class="btn btn-default" href="{{ URL::route('series.index') }}" role="button">View cards »</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4 disabled">
            <a href="{{ URL::route('series.index') }}">
                {{ HTML::image('images/welcome/pokemon-welcome.jpg', 'pokemon', array('class' => 'img-circle center-block', 'width' => '124px', 'height' => '124px')) }}
            </a>
            <h2 class="text-center">Pokémon</h2>
            <p>In this game, players take on the role of a Pokémon trainer, using their creatures to battle. Players play Pokémon to the field and use their attacks to reduce the opponent's HP. When a Pokémon's HP is reduced to 0 it is knocked out and the player who knocked it out takes a Prize card into their hand. A player may win the game in three ways: by collecting all of their prize cards (initially six, but some cards can increase this), if their opponent runs out of Pokémon on the field, or if at the beginning of their opponent's turn there are no cards left to draw in the opponent's deck.</p>
            <p><a class="btn btn-default" href="{{ URL::route('series.index') }}" role="button">View cards »</a></p>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <!-- CARD DATABASE -->
    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading">Card Database</h2>
            <p class="lead">Card lookup including translations.</p>
        </div>
        <div class="col-md-5">
            {{ HTML::image('images/welcome/Optimized-series-preview.jpg', 'pokemon', array( 'width' => '400px', 'height' => '400px')) }}
        </div>
    </div>

    <hr class="featurette-divider">

    <!-- CARD MARKETPLACE -->
    <div class="row featurette">
        <div class="col-md-5">
            {{ HTML::image('images/welcome/market-preview.jpg', 'pokemon', array( 'width' => '400px', 'height' => '400px')) }}
        </div>
        <div class="col-md-7">
            <!-- TODO: Link to marketplace -->
            <h2 class="featurette-heading">Card Marketplace</h2>
            <p class="lead">Buy and sell cards.</p>
        </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->
    <h2 class="text-center">About Us</h2>
    <div class="row">
        <div class="col-md-3">
            <img class="img-circle center-block" src="https://avatars0.githubusercontent.com/u/9195105?v=3&s=460" alt="Generic placeholder image" style="width: 140px; height: 140px;">
            <h3 class="text-center">Luke</h3>
            <p class="text-center">With great power comes... a great card site?</p>
        </div>

        <div class="col-md-3">
            <img class="img-circle center-block" src="https://avatars3.githubusercontent.com/u/1462219?v=3&s=460" alt="Generic placeholder image" style="width: 140px; height: 140px;">
            <h3 class="text-center">Adam</h3>
            <p class="text-center">"Victoria Concordia Crescit"</p>
        </div>

        <div class="col-md-3">
            <img class="img-circle center-block" src="https://avatars1.githubusercontent.com/u/9451135?v=3&s=460" alt="Generic placeholder image" style="width: 140px; height: 140px;">
            <h3 class="text-center">Chris</h3>
            <p class="text-center">Nihongo ga wakarimasen.</p>
        </div>

        <div class="col-md-3">
            <img class="img-circle center-block" src="https://avatars3.githubusercontent.com/u/6792534?v=3&s=460" alt="Generic placeholder image" style="width: 140px; height: 140px;">
            <h3 class="text-center">Aled</h3>
            <p class="text-center">A long time ago in a galaxy far, far away, A young programming master found his calling. And that calling was <strong>DeckCitadel</strong></p>
        </div>
    </div>
@stop