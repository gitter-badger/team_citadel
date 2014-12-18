@extends('master')

@section('header')
    <h2 class="text-center">
        {{{ ucwords($deck->title) }}}
        @if(Auth::check() && Auth::id() == $deck->user->id)
            {{ link_to_route('deck.edit', 'Edit', [$deck->id], ['class' => 'btn btn-default btn-sm']) }}
        @endif
    </h2>
    <div class="text-center">
        {{{ $deck->description }}}
    </div>
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
                    </div>
                    <br>
                    <div class="row">
                        {{ Form::submit('Add Cards', ['class' => 'btn btn-primary pull-right']) }}
                        <div class="col-xs-12 col-md-8">
                            <div clas="pull-left">
                                <div class="col-md-2">
                                    {{ Shareable::facebook($options = array()) }}
                                </div>
                                <div class="col-md-2">
                                    {{ Shareable::googlePlus($options = array()) }}
                                </div>
                                <div class="col-md-2">
                                    {{ Shareable::twitter($options = array()) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    {{ Form::close() }}

    <!-- Comments section -->
    @include('widgets.comment-section', ['type' => $deck])
@stop

@section('scripts')
    @parent
    {{ HTML::script('js/input-select-dropdown.js', ["type" => "text/javascript"]) }}
    <script>
        $('.comment-form').submit(function(e) {
            e.preventDefault();
            var url = decodeURI("{{ URL::route('comment.store') }}");

            $.ajax({
                type: "POST",
                url: url,
                data: {
                    comment: $('#comment-form-comment').val(),
                    id: $('#comment-form-id').val(),
                    type: $('#comment-form-type').val()
                },
                success: function(comment) {
                    if(comment.comment) {
                        var newComment = ' <tr><td> \
                            @if(Auth::check())
                            {{ link_to_route("user.show", Auth::user()->username, [Auth::user()->username]) }} : \
                            @endif
                            ' + comment.comment + ' \
                            <small> \
                                <p>Posted now</p> \
                            </small> \
                        </td></tr> ';

                        $(newComment).prependTo('#comment-table > tbody');
                        $('#comment-form-comment').val('')

                    }
                }
            });
        });
    </script>
@stop