@extends('master')
@section('header')
    <h1 class="text-center">{{ $card->series->name }} <small>- {{ $card->name }}</small></h1>
@stop
@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <ol class="breadcrumb">
                <li><a href="{{ URL::route('games.show','WeissSchwarz') }}"> {{ $card->series->game->name }} </a></li>
                <li><a href="{{ $card->series->url }}">{{ $card->series->name }}</a></li>
                <li class="active">{{ $card->serial_number . " " . $card->rarity }} </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-4">
            <a data-toggle="modal" data-target="#image-modal" href="">
                @if(file_exists(public_path() . '/images/cards/'. str_replace('/', '-', $card->serial_number) . '-' . $card->rarity . '.jpg'))
                    <img class="image-responsive center-block" src="{{ asset('images/cards/'. str_replace('/', '-', $card->serial_number) . '-' . $card->rarity . '.jpg') }}" width="70%">
                @else
                    <img class="image-responsive center-block" src="{{ asset('images/cards/back.jpg') }}">
                @endif
            </a>
        </div>
        <div class="col-xs-12 col-md-8">
            <table class="table table-striped">
                <tr>
                    <td><label>Type</label></td>
                    <td>{{ $card->attributes->find(4)->pivot->value }}</td>
                    <td><label>Level</label></td>
                    <td>{{ $card->attributes->find(9)->pivot->value }}</td>
                </tr>
                <tr>
                    <td><label>Colour</label></td>
                    <td>{{ $card->attributes->find(5)->pivot->value }}</td>
                    <td><label>Cost</label></td>
                    <td>{{ $card->attributes->find(7)->pivot->value }}</td>
                </tr>
                <tr>
                    <td><label>Power</label></td>
                    <td>{{ $card->attributes->find(10)->pivot->value }}</td>
                    <td><label>Soul</label></td>
                    <td>{{ $card->attributes->find(8)->pivot->value }}</td>
                </tr>
                <tr>
                    <td><label>Traits</label></td>
                    <td>
                        {{ $card->attributes->find(1)->pivot->value }}<br>
                        {{ $card->attributes->find(2)->pivot->value }}
                    </td>
                    <td><label>Trigger</label></td>
                    <td>{{ $card->attributes->find(3)->pivot->value }}</td>
                </tr>
            </table>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <label>Card Text/ Abilities</label>
                </div>
                <div class="panel-body">
                    {{{ $card->attributes->find(6)->pivot->value }}}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="image-modal">
        <div class="modal-dialog">
            <div class="modal-content modal-popup-image">
                @if(file_exists('public/images/cards/'. str_replace('/', '-', $card->serial_number) . '-' . $card->rarity . '.jpg'))
                    <img class="series-image image-responsive center-block" src="{{ asset('images/cards/'. str_replace('/', '-', $card->serial_number) . '-' . $card->rarity . '.jpg') }}">
                @else
                    <img class="series-image image-responsive center-block" src="{{ asset('images/cards/back.jpg') }}">
                @endif
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop