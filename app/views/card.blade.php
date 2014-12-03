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
                    <td>{{{ $card->attributes->find(4)->pivot->value }}}</td>
                    <td><label>Level</label></td>
                    <td>{{{ $card->attributes->find(9)->pivot->value }}}</td>
                </tr>
                <tr>
                    <td><label>Colour</label></td>
                    <td>{{{ $card->attributes->find(5)->pivot->value }}}</td>
                    <td><label>Cost</label></td>
                    <td>{{{ $card->attributes->find(7)->pivot->value }}}</td>
                </tr>
                <tr>
                    <td><label>Power</label></td>
                    <td>{{{ $card->attributes->find(10)->pivot->value }}}</td>
                    <td><label>Soul</label></td>
                    <td>{{{ $card->attributes->find(8)->pivot->value }}}</td>
                </tr>
                <tr>
                    <td><label>Traits</label></td>
                    <td>
                        {{ $card->attributes->find(1)->pivot->value }}<br>
                        {{{ $card->attributes->find(2)->pivot->value }}}
                    </td>
                    <td><label>Trigger</label></td>
                    <td>{{{ $card->attributes->find(3)->pivot->value }}}</td>
                </tr>
            </table>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Card Text/ Abilities
                </div>
                <div class="panel-body">
                    {{{ $card->attributes->find(6)->pivot->value }}}
                </div>
            </div>
        </div>
    </div>
    <br>

    <!-- ratings section -->
    <div class="row well">
        <div class="col-md-6">
            <h2>Ratings</h2>
            <h5>Using these criteria:</h5>
            <!-- different attributes to rate a card on -->
            @if(Auth::check())
                <form class="form-horizontal rate-card-form" role="form" method="POST" action="" novalidate>
            @else
                <form class="form-horizontal rate-card-form disabled" role="form" method="POST" action="" novalidate>
            @endif
                @foreach($rateables as $rateable)
                    <div class="form-group">
                        <label class="rating-lable">{{ $rateable->name }}</label>
                        <div class="col-sm-6 rating-stars" data-rateable-name="{{ $rateable->name }}" data-rateable-id="{{ $rateable->id }}">
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                        </div>
                    </div>
                @endforeach

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

        <!-- show chart -->
        <div class="col-md-6">
            <h2>Graph</h2>
            <canvas id="your-rating"></canvas>
            <div class="pull-right" id='legend-div'></div>
        </div>
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
    <script src="/js/charts/chart.min.js"></script>
    <script src="/js/charts/createRadarChart.js"></script>
    <script>
    $(function() {
        // The users previous rating. values will be null if they have not rated before
        var previousUserRatings = {{ json_encode($previousUserRatings) }};
        var hasRatedPreviously = true;

        // TODO: if they rate 5 stars, does not display the stars
        $.each(previousUserRatings, function(key, value) {
            // If they have rated the card before
            if(value != null) {
                // since prevAll isn't working for 5 star ratings, we do this.
                if(value == 5) {
                    $('div').find("[data-rateable-name='" + key + "'] > ")
                        .removeClass('glyphicon-star-empty')
                        .addClass('glyphicon-star');
                } else {
                    // doesn't work with 5 stars (displays them all as empty)
                    $('div').find("[data-rateable-name='" + key + "'] > .glyphicon-star-empty:eq(" + value + ")")
                        .prevAll()
                        .removeClass('glyphicon-star-empty')
                        .addClass('glyphicon-star');
                }

            } else {
                // there ISN'T a previous rating by this user so we change the submit from create to update
                hasRatedPreviously = false;
            }
        });

        function radarChart() {
            var chartLabels = [];
            var averageData = [];
            var userData = [];
            var avgAsJSON = {{ json_encode($averageRatings) }};

            // get the rating the user just submitted.
            ajaxData = getRatings();

            for(name in ajaxData.ratingNames) {
                chartLabels.push(ajaxData.ratingNames[name]);
            }

            $.each(avgAsJSON, function(index) {
                averageData.push(avgAsJSON[index]);
            });

            $.each(ajaxData.ratingIds, function(index) {
                userData.push(ajaxData.ratingIds[index]);
            });

            // create new chart on canvas with id "your-rating".
            createRadarChart(chartLabels, averageData, userData, "your-rating");
        }

        // create initial chart without user ratings
        radarChart();

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
            var url;
            var data = getRatings();
            var $this = $(this);

            // console.log(data);

            // if they have previously rated the card, we want to update
            if(hasRatedPreviously) {
                url = decodeURI("{{ URL::route('rating.update') }}");
                url = url.replace('{id}', {{ $card->id }})
            } else {
                //  if they have not previously rated the card, we want to store
                url = "{{ URL::route('rating.store') }}";
            }

            $.ajax({
                type: "POST",
                url: url,
                data: data,

                success: function(json) {
                    console.log(json);
                    radarChart();
                }
            });
        });

        function getRatings() {
            ajaxData = {
                card_id : {{ $card->id }},
                ratingIds : {}, // store id and value
                ratingNames : [] // store name - used for graph
            };

            $('.rating-stars').each(function () {
               var $this = $(this);
               var starCount = $this.find('.glyphicon-star').length;
               var rateableId = $this.data('rateable-id');
               ajaxData.ratingIds[rateableId] = starCount;

               var rateableName = $this.data('rateable-name');
               ajaxData.ratingNames.push(rateableName);

            });

            return ajaxData;
        }
    });
    </script>
@stop
