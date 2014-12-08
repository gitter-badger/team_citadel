@extends('master')

    @section('header')
        <h2 class="text-center">{{{ ucwords($deck->title) }}}</h2>
    @stop

    @section('content')
        {{ Form::open(['route' => ['addCard', $deck->id]]) }}

            <div class="row">
                @foreach($deck->cards as $card)
                    <div class='col-sm-2 col-xs-12'>
                        <a href="{{ $card->url }}" title="{{{ $card->name  . " " . $card->rarity }}}">
                            <div style="min-height: 100px">
                                <!-- if image exists, show it, else show back of card -->
                                @if(file_exists(public_path() . '/images/cards/'. str_replace('/', '-', $card->serial_number) . '-' . $card->rarity . '.jpg'))
                                    <img class="image-responsive center-block" src="{{ asset('images/cards/'. str_replace('/', '-', $card->serial_number) . '-' . $card->rarity . '.jpg') }}" width="90%" style="height: 200px">
                                @else
                                    <img class="image-responsive center-block" src="{{ asset('images/games/' . $deck->game_id . '-back.jpg') }}" width="90%" style="height: 200px">
                                @endif
                            </div>
                            <p class="text-center series-card-name">
                                {{ $card->name  . " " . $card->rarity }}
                            </p>
                        </a>
                    </div>
                @endforeach
            </div>

            @if( Auth::user()->id == $deck->users->first()->id)
                <div class="form-group">
                    <div class="well">
                        <div class="row">
                            {{ Form::label('Cards') }}
                            {{ Form::hidden('deck', $deck) }}
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