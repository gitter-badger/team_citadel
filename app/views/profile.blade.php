@extends('master')
@section('content')
<!-- Nav tabs -->
<ul class="nav nav-tabs col-md-12" role="tablist">
    <li role="presentation" class="active"><a href="#wall-tab" role="tab" data-toggle="tab">Wall</a></li>
    <li role="presentation"><a href="#profile" role="tab" data-toggle="tab">Profile</a></li>
    <li role="presentation"><a href="#myMarket" role="tab" data-toggle="tab">Order History</a></li>
    <li role="presentation"><a href="#messages" role="tab" data-toggle="tab">Messages</a></li>
    <li role="presentation"><a href="#settings" role="tab" data-toggle="tab">Settings</a></li>
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
        @if(sizeof($decks > 0)
             @foreach($decks as $deck)
                <div class="row">
                    <div class="col-md-12 post-border">
                        <span class="col-sm-3 col-md-2">
                            <img class="responsive-image center-block" src="{{ $deck->game_id.'-back'}}.png" width="70%">
                        </span>
                        <h4>{{{ $deck->title }}}</h4>
                        <p>{{{ $deck->description }}}</p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <div role="tabpanel" class="tab-pane" id="messages">
        <div class="row well post-border">
            <div class="col-md-3">
                <h4 class="text-center">
                    <a href="/messages/create">
                        Create Message <icon class="glyphicon glyphicon-envelope"></icon>
                    </a>
                </h4>
            </div>
        </div>
        <div class="row well post-border">
            <div class="col-md-3">
                <h4 class="text-center">
                    <a href="/messages/sent">
                        Sent <icon class="glyphicon glyphicon-envelope"></icon>
                    </a>
                </h4>
            </div>
        </div>
        <div class="row well post-border">
            <div class="col-md-3">
                <h4 class="text-center">
                    <a href="/messages/received">
                        Inbox <icon class="glyphicon glyphicon-envelope"></icon>
                    </a>
                </h4>
            </div>
        </div>
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
                    <h3> {{ $user->username }} </h3>
                    <table class="table table-hover">
                        <tr>
                            <td>Title</td>
                            <td>{{ $user->title }}</td>
                        </tr>
                        <tr>
                            <td>Firstname</td>
                            <td>{{ $user->first_name }}</td>
                        </tr>
                        <tr>
                            <td>Lastname</td>
                            <td>{{ $user->last_name}}
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$user->email}}
                        </tr>
                        <tr>
                            <td>DOB</td>
                            <td>{{$user->date_of_birth}}
                        </tr>
                        <tr>
                            <td>Location</td>
                            <td>{{$user->location}}</td>
                        </tr>
                    </table>
                    <a href="{{ URL::route('edit.profile.form', $user->username) }}" class="btn btn-custom btn-lg btn-block"> Edit</a>
                </div>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="myMarket">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>Your Order History</h1>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-4">Order Placed</div>
                    <div class="col-md-4">Total</div>
                    <div class="col-md-4">Dispatch to</div>
                </div>
                <div class="row">
                    <div class="col-md-4"><small>14 September 2014</small></div>
                    <div class="col-md-4">£5.94</div>
                    <div class="col-md-4">Phoophanom Tanprasit</div>
                </div>
            </div>
            <div class="panel-body">
                <div class="col-md-2">
                    <img class="market-img image-responsive center-block" src="{{ asset('images/cards/1.jpeg') }}">
                </div>
                <div class="col-md-6">
                    <h4>"Songstress" Inori</h4>
                    <p>Sold by: Admin</p>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-default btn-md btn-block">Message seller</button><br>
                    <button class="btn btn-default btn-md btn-block">Returns Item</button><br>
                    <button class="btn btn-default btn-md btn-block">Leave a seller feedback</button>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-4">Order Placed</div>
                    <div class="col-md-4">Total</div>
                    <div class="col-md-4">Dispatch to</div>
                </div>
                <div class="row">
                    <div class="col-md-4"><small>14 September 2014</small></div>
                    <div class="col-md-4">£5.94</div>
                    <div class="col-md-4">Phoophanom Tanprasit</div>
                </div>
            </div>
            <div class="panel-body">
                <div class="col-md-2">
                    <img class="market-img image-responsive center-block" src="{{ asset('images/cards/1.jpeg') }}">
                </div>
                <div class="col-md-6">
                    <h4>"Songstress" Inori</h4>
                    <p>Sold by: Admin</p>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-default btn-md btn-block">Message seller</button><br>
                    <button class="btn btn-default btn-md btn-block">Returns Item</button><br>
                    <button class="btn btn-default btn-md btn-block">Leave a seller feedback</button>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-4">Order Placed</div>
                    <div class="col-md-4">Total</div>
                    <div class="col-md-4">Dispatch to</div>
                </div>
                <div class="row">
                    <div class="col-md-4"><small>14 September 2014</small></div>
                    <div class="col-md-4">£5.94</div>
                    <div class="col-md-4">Phoophanom Tanprasit</div>
                </div>
            </div>
            <div class="panel-body">
                <div class="col-md-2">
                    <img class="market-img image-responsive center-block" src="{{ asset('images/cards/1.jpeg') }}">
                </div>
                <div class="col-md-6">
                    <h4>"Songstress" Inori</h4>
                    <p>Sold by: Admin</p>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-default btn-md btn-block">Message seller</button><br>
                    <button class="btn btn-default btn-md btn-block">Returns Item</button><br>
                    <button class="btn btn-default btn-md btn-block">Leave a seller feedback</button>
                </div>
            </div>
        </div>
    </div>

        @if( Auth::check() && Auth::user()->id == $user->id )
            <div role="tabpanel" class="tab-pane" id="messages">Future Updates</div>

            <div role="tabpanel" class="tab-pane" id="settings">Future Updates</div>
        @endif
</div>
@stop
@section('scripts')
    @parent
    {{ HTML::script('js/validation.js') }}
@stop
