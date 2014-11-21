@extends('master')
@section('content')
    <div class="row">
        <div class="col-md col-md-offset-2">
        <div class="page-header">
            <h1>Weiβ Schwarz <small>- Search Results for {{$query}}</small></h1>
        </div>
    </div>
    @foreach($cards as $card)
        <div class="row result-row-border">
            <div class="col-sm-2  col-sm-offset-2">
                <a href="{{asset('card/'.$card->id.'')}}">
                    <img class="card-result-image" src="{{asset('/images/cards/' . $card->id . '.jpeg')}}" width="70%">
                </a>
            </div>
            <div class="col-sm-6 result-border" >
                <h4>
                    <a href="{{asset('market/'.$card->id.'')}}">{{$card->name}}</a>
                    <h5>{{$card->unique_identifier}}</h5>
                </h4>
                <div class="row">
                    <div class="col-sm-3">
                        <label>Series</label>
                        <p>{{$card->series_name}}</p>
                        <label>Type</label>
                        <p>{{$card->type}}</p>
                    </div>
                    <div class="col-sm-3">
                        <label>Level</label>
                            <p>{{$card->level}}</p>
                        <label>Power</label>
                            <p>{{$card->power}}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@stop