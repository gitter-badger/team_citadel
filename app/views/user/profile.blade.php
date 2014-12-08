@extends('master')
@section('content')
<!-- Nav tabs -->
<ul class="nav nav-tabs col-md-12" role="tablist">
    <li role="presentation" class="active"><a href="#wall-tab" role="tab" data-toggle="tab">Wall</a></li>
    <li role="presentation"><a href="#profile" role="tab" data-toggle="tab">Profile</a></li>
    @if( Auth::check() )
        @if( Auth::user()->id == $user->id )
            <li role="presentation"><a href="#messages" role="tab" data-toggle="tab">Messages</a></li>
        @endif
        @if( Auth::user()->id == $user->id )
            <li role="presentation"><a href="#settings" role="tab" data-toggle="tab">Settings</a></li>
        @endif
    @endif
</ul>
<!-- Tab panes -->
<div class="tab-content col-md-12">
    <div class="tab-pane active" id="wall-tab">
        <div class="row well post-border">
            <div class="col-md-3">
                <h4 class="text-center">
                    <a href="/decks/create">
                        Create Deck <icon class="glyphicon glyphicon-plus-sign"></icon>
                    </a>
                </h4>
            </div>
        </div>
         @foreach($decks as $deck)
            <div class="row">
                <div class="col-md-12 post-border">
                    <span class="col-sm-3 col-md-2">
                        @if($deck->game_id == 1)
                            <img class="responsive-image center-block" src="/images/games/{{ $deck->game_id.'-back'}}.jpg" width="70%">
                        @elseif($deck->game_id == 2)
                            <img class="responsive-image center-block" src="http://mtgimage.com/card/cardback.hq.jpg" width="70%">
                        @endif
                    </span>
                    <h4>{{{ ucwords($deck->title) }}}</h4> {{ link_to_route('deck.show', 'See full deck', [$deck->id]) }}
                    <p>{{{ $deck->description }}}</p>
                </div>
            </div>
        @endforeach
    </div>

    <div role="tabpanel" class="tab-pane" id="profile">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>Your Profile</h1>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <img class="img-circle profile-img" src="{{ asset(  'images/users/' . $user->id . '.jpeg') }}">
                </div>
                <div class="col-md-6">
                    <h3> {{{ $user->username }}} </h3>
                    <table class="table table-hover">
                        <tr>
                            <td>Title</td>
                            <td>{{{ $user->title }}}</td>
                        </tr>
                        <tr>
                            <td>Firstname</td>
                            <td>{{{ $user->first_name }}}</td>
                        </tr>
                        <tr>
                            <td>Lastname</td>
                            <td>{{{ $user->last_name }}}
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{{ $user->email }}}
                        </tr>
                        <tr>
                            <td>DOB</td>
                            <td>{{{ $user->date_of_birth }}}
                        </tr>
                        <tr>
                            <td>Location</td>
                            <td>{{{ $user->location }}}</td>
                        </tr>
                    </table>
                    <a href="{{ route('edit.user', $user->username) }}" class="btn btn-custom btn-lg btn-block"> Edit</a>
                </div>
            </div>
        </div>
    </div>
    @if( Auth::check() )
        @if( Auth::user()->id == $user->id )
            <div role="tabpanel" class="tab-pane" id="messages">Future Updates</div>
        @endif
        @if( Auth::user()->id == $user->id )
            <div role="tabpanel" class="tab-pane" id="settings">Future Updates</div>
        @endif
    @endif
</div>
@stop
@section('scripts')
    @parent
    {{ HTML::script('js/validation.js') }}
@stop
