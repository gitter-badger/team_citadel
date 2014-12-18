@extends('master')

@section('header')
    <div class="text-center">
        <h2>
            Recent Decks
            @if(Auth::check())
                {{ link_to_route('deck.create', 'Create your deck', null, ['class' => 'btn btn-primary btn-sm pull-right']) }}
            @endif
        </h2>
    </div>
@stop

@section('content')
        <div class='row'>
            <table id="cardsTable" class="table table-hover">
                <thead>
                    <tr>
                        <th class="cards-col-width"></th>
                        <th class="vert-align text-center">Name</th>
                        <th class="vert-align text-center">Description</th>
                        <th class="vert-align text-center">Game</th>
                        <th class="vert-align text-center">Uploaded</th>
                        <th class="vert-align text-center">Created By</th>
                    </tr>
                </thead>
                <tbody>
                 @foreach($decks as $deck)
                    @if(count($deck->cards) > 0)
                    <tr class="clickable-row" href="{{ route('deck.show', $deck->id) }}">
                        <td>
                             <div class="img_wrapper_cards center-block">
                                <img class="img-responsive" src="{{ $deck->cards->first()->getSmallImageURL() }}" onload="imgLoaded(this)">
                             </div>
                        </td>
                        <td class="vert-align text-center">{{ $deck->title }}</td>
                        <!-- Get card type attribute -->
                        <td class="vert-align text-center deck-description-text">{{ Str::limit($deck->description, 200) }}</td>
                        <!-- Get card colour attribute -->
                        <td class="vert-align text-center">{{ $deck->game->name }}</td>
                        <td class="vert-align text-center">{{ $deck->updated_at->diffForHumans() }}</td>
                        <td class="vert-align text-center">{{ link_to_route('user.show', $deck->user->username, [$deck->user->username]) }} </td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    <div class="row text-center">
        {{ $decks->links() }}
    </div>
@stop

@section('scripts')
    @parent
    <script type="text/javascript">
        $(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.document.location = $(this).attr("href");
            });

            $('#cardsTable').DataTable();
        });
    </script>
@stop