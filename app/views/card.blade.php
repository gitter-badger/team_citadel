@extends('master')
@section('header')
<h1 class="text-center">{{ $card->series->name }} <small>- {{ $card->name }}</small></h1>
@stop 
@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-offset-2 col-md-8">
            <ol class="breadcrumb">
                <li><a href="{{ URL::route('series.index') }}">Series</a></li>
                <li><a href="{{ $card->series->url }}">{{ $card->series->name }}</a></li>
                <li class="active">{{ $card->serial_number }}</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <a data-toggle="modal" data-target="#image-modal" href="">
                <!-- I know you hate this nathan but please let this go for now :) -->
                <img class="card-single-image image-responsive center-block" src="{{ asset('/images/cards/' . $card->id . '.jpeg') }}">
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-offset-2 col-md-8">
            <table class="table table-striped">
                <tr>
                    <td><label>Type</label></td>
                    <td>{{ $card }}</td>
                    <td><label>Level</label></td>
                    <td>{{ $card->level }}</td>
                </tr>
                <tr>
                    <td><label>Colour</label></td>
                    <td>{{$card->colour}}</td>
                    <td><label>Cost</label></td>
                    <td>{{$card->cost}}</td>
                </tr>   
                <tr>
                    <td><label>Trigger</label></td>
                    <td colspan='3'>{{$card->trigger}}</td>
                </tr>
                <tr>
                    <td><label>Power</label></td>
                    <td>{{$card->power}}</td>
                    <td><label>Soul</label></td>
                    <td>{{$card->soul}}</td>
                </tr>
                <tr>
                    <td><label>Traits</label></td>
                    <td colspan='3'>{{$card->traits}}</td>
                </tr>
            </table>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Card Text/ Abilities
                </div>
                <div class="panel-body">
                    @if ($card->eng_text != 'N/A')
                        <p>{{$card->eng_text}}</p>
                        @if ($card->eng_text2 != 'N/A')
                            <p>{{$card->eng_text2}}</p>
                        @endif
                    @else
                        <p>{{$card->eng_text}}</p>
                    @endif
                    @if ($card->jap_text  != 'N/A')
                        <p>{{$card->jap_text}}</p>
                        @if ($card->jap_text2 != 'N/A')
                            <p>{{$card->jap_text2}}</p>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="image-modal">
        <div class="modal-dialog">
            <div class="modal-content modal-popup-image">
                <img class="popup-image" src="{{ asset('/images/cards/' . $card->id . '.jpeg') }}">
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop