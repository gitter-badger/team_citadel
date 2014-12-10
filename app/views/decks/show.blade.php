@extends('master')

    @section('header')
        <h2 class="text-center">{{{ ucwords($deck->title) }}}</h2>
    @stop

    @section('content')
        {{ Form::open(['route' => ['addCard', $deck->id]]) }}

            <div class="row">
                @foreach($deck->cards as $card)
                    <div class='col-sm-2 col-xs-12'>

                            <div style="min-height: 100px">
                                <!-- if image exists, show it, else show back of card -->
                                @if($deck->game_id == 1)
                                    @if(file_exists(public_path() . '/images/cards/'. str_replace('/', '-', $card->serial_number) . '-' . $card->rarity . '.jpg'))
                                        <div class="img-wrap-decks" data-cardId="{{ $card->id }}" data-deckId="{{ $deck->id }}">
                                            <icon class="close glyphicon glyphicon-remove"></icon>
                                            <a href="{{ $card->url }}" title="{{{ $card->name  . " " . $card->rarity }}}">
                                                <img class="image-responsive center-block" src="{{ asset('images/cards/'. str_replace('/', '-', $card->serial_number) . '-' . $card->rarity . '.jpg') }}" width="90%">
                                            </a>
                                        </div>
                                    @else
                                        <div class="img-wrap-decks" data-cardId="{{ $card->id }}" data-deckId="{{ $deck->id }}">
                                            <icon class="close glyphicon glyphicon-remove"></icon>
                                            <a href="{{ $card->url }}" title="{{{ $card->name  . " " . $card->rarity }}}">
                                                <img class="image-responsive center-block" src="{{ asset('images/games/' . $deck->game_id . '-back.jpg') }}" width="90%">
                                            </a>
                                        </div>
                                        </div>
                                    @endif
                                @elseif($deck->game_id == 2)
                                    <div class="img-wrap-decks" data-cardId="{{ $card->id }}" data-deckId="{{ $deck->id }}">
                                        <icon class="close glyphicon glyphicon-remove"></icon>
                                        <a href="{{ $card->url }}" title="{{{ $card->name  . " " . $card->rarity }}}">
                                            <img class="image-responsive center-block" src="{{ ('http://mtgimage.com/set/' . $card->serial_number . '/' . $card->name . '.jpg') }}" style="height: 200px">
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <p class="text-center series-card-name">
                                {{ $card->name  . " " . $card->rarity }}
                            </p>
                    </div>
                @endforeach
            </div>
            @if(Auth::check()) {{-- if we don't check to see if user is logged in, we get property of non-object --}}
                @if(Auth::user()->id == $deck->users->first()->id)
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
            @endif

        {{ Form::close() }}
    @stop

    @section('scripts')
        @parent
        {{ HTML::script('js/input-select-dropdown.js', ["type" => "text/javascript"]) }}
    @stop