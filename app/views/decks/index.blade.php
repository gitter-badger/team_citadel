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
                            <img class="responsive-image center-block" src="/images/games/{{ $deck->game_id.'-back'}}.png" width="70%">
                        </span>
                    <div class="col-md-9 vCenter">
                        <div class=''>
                            <h4>{{{ $deck->title }}}</h4>
                        </div>
                        <hr>
                        <div class="">
                            <p>{{{ $deck->description }}}</p>
                        </div>
                        <hr>
                         <div class="row">
                            <div class="col-md-3">
                                Created by: {{ link_to_route('profile', $deck->users->first()->username, $parameter = [$deck->users->first()->username]) }}
                            </div>

                            <div class="col-md-4 pull-right">
                                Created at: {{ $deck->users->first()->created_at->diffForHumans() }}
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