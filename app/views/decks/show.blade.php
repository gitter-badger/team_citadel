@extends('master')

@section('header')
    <h2 class="text-center">
        {{{ ucwords($deck->title) }}}
        @if(Auth::check() && Auth::id() == $deck->user->id)
            {{ link_to_route('deck.edit', 'edit information', [$deck->id]) }}
        @endif
    </h2>
@stop

@section('content')
    {{ Form::open(['route' => ['addCard', $deck->id]]) }}

        <div class="row">
            @foreach($deck->cards as $card)
                <div class='col-sm-2 col-xs-12'>
                    <div class="img-wrap-decks" data-card="{{ $card->id }}" data-deck="{{ $deck->id }}" style="min-height: 100px">
                        @if(Auth::check() && Auth::id() == $deck->user->id)
                            <icon class="close glyphicon glyphicon-remove"></icon>
                        @endif
                        <a href="{{ $card->url }}" title="{{{ $card->name  . " " . $card->rarity }}}" class="img_wrapper_cards">
                            <div class="img_wrapper_cards center-block">
                                <img class="center-block" src="{{ $card->getMediumImageURL() }}" onload="imgLoaded(this)" width="100%">
                            </div>
                        </a>
                    </div>
                    <p class="text-center series-card-name">
                        {{ $card->name  . " " . $card->rarity }}
                    </p>
                </div>
            @endforeach
        </div>
        @if(Auth::check() && Auth::id() == $deck->user->id)
            <div class="form-group">
                <div class="well">
                    <div class="row">
                        {{ Form::label('Cards') }}
                        {{ Form::hidden('deck', $deck->id) }}
                        {{ Form::text("query", "", ["class" => "form-control", "id" => 'searchbox', 'placeholder' => "Search Cards for your Deck...", 'data-id' => $deck->game_id]) }}
                        {{ Form::submit('Add Cards', ['class' => 'btn btn-primary pull-right']) }}
                    </div>
                </div>
            </div>
        @endif
    {{ Form::close() }}
@stop

@section('scripts')
    @parent
    {{ HTML::script('js/input-select-dropdown.js', ["type" => "text/javascript"]) }}
@stop