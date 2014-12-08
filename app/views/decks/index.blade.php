@extends('master')

@section('header')
    <div class="text-center">
        <h2>Recent Decks</h2>
    </div>
@stop

@section('content')
     @foreach($decks as $deck)
        <div class="row">
            <div class="col-md-12  post-border ">
                    <span class="col-sm-3 col-md-2 vCenter">
                        <img class="responsive-image center-block" src="/images/games/{{ $deck->game_id.'-back'}}.jpg" width="70%">
                    </span>
                <div class="col-md-9 vCenter">
                    <div class=''>

                        <h4>{{{ ucwords($deck->title) }}}</h4> {{ link_to_route('deck.show', 'See full deck', [$deck->id]) }}
                    </div>
                    <hr>
                    <div class="">
                        <p>{{{ $deck->description }}}</p>
                    </div>
                    <hr>
                     <div class="row">
                        <div class="col-md-6">
                            Created:{{ $deck->users->first()->created_at->diffForHumans()}} by {{ link_to_route('user.show', $deck->users->first()->username, [$deck->users->first()->username]) }}
                        </div>

                        <div class="col-md-4 pull-right">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="row text-center">
        {{ $decks->links() }}
    </div>
@stop

@section('scripts')
    @parent
@stop