@extends('master')
@section('header')
    <h1 class="text-center">{{ $card->series->name }} <small>- {{ $card->name }}</small></h1>
@stop
@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <ol class="breadcrumb">
                <li><a href="{{ URL::route('series.index') }}"> {{ $card->series->game->name }} </a></li>
                <li><a href="{{ $card->series->url }}">{{ $card->series->name }}</a></li>
                <li class="active">{{ $card->serial_number . " " . $card->rarity }} </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-4">
            <a data-toggle="modal" data-target="#image-modal" href="">
                @if(file_exists(public_path() . '/images/cards/'. str_replace('/', '-', $card->serial_number) . '-' . $card->rarity . '.jpg'))
                    <img class="image-responsive center-block" src="{{ asset('images/cards/'. str_replace('/', '-', $card->serial_number) . '-' . $card->rarity . '.jpg') }}" width="100%">
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
                    Card Text/ Abilities
                </div>
                <div class="panel-body">
                    {{ $card->attributes->find(6)->pivot->value }}
                </div>
            </div>
        </div>
    </div>
    <br>

    <!-- ratings section -->
    <div class="row well">
        <h2>Ratings</h2>
        <h5>Using these criteria:</h5>
        <!-- different attributes to rate a card on -->
        <form class="form-horizontal rate-card-form" role="form" method="POST" action="" novalidate>
            <div class="form-group">
                <label class="rating-lable">Kawaiiness: </label>
                <div class="col-sm-6 rating-stars" data-rateable="kawaiiness">
                    <span class="glyphicon glyphicon-star-empty"></span>
                    <span class="glyphicon glyphicon-star-empty"></span>
                    <span class="glyphicon glyphicon-star-empty"></span>
                    <span class="glyphicon glyphicon-star-empty"></span>
                    <span class="glyphicon glyphicon-star-empty"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="rating-lable">Second: </label>
                <div class="col-sm-6 rating-stars" data-rateable="second">
                    <span class="glyphicon glyphicon-star-empty"></span>
                    <span class="glyphicon glyphicon-star-empty"></span>
                    <span class="glyphicon glyphicon-star-empty"></span>
                    <span class="glyphicon glyphicon-star-empty"></span>
                    <span class="glyphicon glyphicon-star-empty"></span>
                </div>
            </div>
            <!-- endif will go here -->
            <div class="form-group">
                <div class="col-sm-6">
                <input
                    id="submit-ratings-btn"
                    type="submit"
                    value="Submit My Ratings"
                    class="btn login-btn btn-success pull-right">
                </div>
            </div>
        </form>
    </div>

    <div class="row">
        <nav>
          <ul class="pager">
            <li class="previous disabled"><a href="#"><span aria-hidden="true">&larr;</span> Older</a></li>
            <li class="next disabled"><a href="#">Newer <span aria-hidden="true">&rarr;</span></a></li>
          </ul>
        </nav>
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

@section('scripts')
    @parent
    <script>
    $(function() {
        // change stars based on which is pressed
        $('.rating-stars span').click(function(){
            // add stars to star-icon clicked
            $(this)
                .removeClass('glyphicon-star-empty')
                .addClass('glyphicon-star');
            // add stars to previous star-icons clicked (on left)
            $(this).prevAll()
                .addClass('glyphicon-star')
                .removeClass('glyphicon-star-empty');
            // add stars to previous star-icons clicked (on left)
            $(this).nextAll()
                .addClass('glyphicon-star-empty')
                .removeClass('glyphicon-star');
        });

        // The user clicks submit my ratings
        $('.rate-card-form').submit(function(e) {
            e.preventDefault();
            console.log(getRating());
        }); // end of submit event handler

        function getRating() {
            ajaxData = {
                card_id : {{ $card->id }},
                ratings : {}
            };

            $('.rating-stars').each(function () {
               var $this = $(this);
               var starCount = $this.find('.glyphicon-star').length;
               var rateable = $this.data('rateable');
               console.log();
               ajaxData.ratings[rateable] = starCount;
            });

            return ajaxData;
        }
    });
    </script>
@stop
