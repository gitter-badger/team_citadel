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
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <img class="img-circle profile-img" src="{{ asset('images/users/1.jpeg') }}">
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
                            <td>{{$user->email_address}}
                        </tr> 
                        <tr>
                            <td>DOB</td>
                            <td>{{$user->date_of_birth}}
                        </tr>
                        <tr>
                            <td>Location</td>
                            <td>{{$user->location}}</td>
                        </tr>  
                        <tr>
                            <td>Mobile Number</td>
                            <td>{{$user->mobile_phone}}
                        </tr>
                        <tr>
                            <td>Home Number</td>
                            <td>{{$user->home_telephone}}
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
                <table class="table">
                    <tr>
                        <td>Order Placed</td>
                        <td>Total</td>
                        <td>Dispatch to</td>
                    </tr>
                    <tr>
                        <td><small>14 September 2014</small></td>
                        <td>£5.94</td>
                        <td>Phoophanom Tanprasit</td>
                    </tr>
                </table>
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
                    <button class="btn btn-default btn-md btn-block">Return Card</button><br>
                    <button class="btn btn-default btn-md btn-block">Leave a seller feedback</button>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <table class="table">
                    <tr>
                        <td>Order Placed</td>
                        <td>Total</td>
                        <td>Dispatch to</td>
                    </tr>
                    <tr>
                        <td><small>14 September 2014</small></td>
                        <td>£5.94</td>
                        <td>Phoophanom Tanprasit</td>
                    </tr>
                </table>
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
                    <button class="btn btn-default btn-md btn-block">Return Card</button><br>
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
<script type="text/javascript" src="{{asset('js/validation.js')}}"></script>
@stop