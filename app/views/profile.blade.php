@extends('master')
@section('content')
<!-- Nav tabs -->
<ul class="nav nav-tabs col-md-12" role="tablist">
    <li role="presentation" class="active"><a href="#profile" role="tab" data-toggle="tab">Profile</a></li>
    <li role="presentation"><a href="#myMarket" role="tab" data-toggle="tab">Order History</a></li>
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
    <div role="tabpanel" class="tab-pane active" id="profile">
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
<script type="text/javascript" src="{{asset('js/validation.js')}}"></script>
@stop