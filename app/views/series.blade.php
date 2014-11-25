@extends('master')
@section('content')
<div class="row">
    <div class="page-header">
        <h1>Weiβ Schwarz <small>- Series</small></h1>
    </div>
</div>
<div class="row">
    <ol class="breadcrumb">
        <li>
            <a href="{{asset('news')}}">Home</a>
        </li>
        @if( sizeof($cards) >= 1 )
            <li>
                <a href="{{asset('series')}}">Series</a>
            </li>
            <li class="active">
                {{$series->name}}
            </li>           
        @else
            <li class="active">Series</li>
        @endif
    </ol>
</div>
<div class='row'>
    @if( sizeof($cards) >= 1 )
        @foreach( $cards as $card )
            <div class='col-xs-4 col-sm-2 col-md-1'>
                <a href="{{asset('card/' . $card->id .'')}}">
                    <img class="card-thumb-images image-responsive center-block" src="{{asset('images/cards/'. $card->id . '.jpeg')}}" width="90%">
                </a>
            </div>
        @endforeach
    @else
        @foreach( $series as $series )
            <div class='col-sm-3 col-xs-12'>
                <a href="{{asset('series/' . $series->id . '')}}">
                    <img class="series-images image-responsive center-block" src="{{asset('images/series/'. $series->id . '.jpeg')}}" width="90%">
                    <h5 class='text-center'>
                        {{ $series->name }}
                    </h5>
                </a>
            </div>
        @endforeach
    @endif
</div>
@stop