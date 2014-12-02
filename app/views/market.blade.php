@extends( 'master' )
@section('header') 
    <h1 class="text-center">Weiβ Schwarz <small>- Market</small></h1>
@stop
@section( 'content' )
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Categories</h3>
            </div>
            <div class="panel-body">
                <div class="checkBox"> 
                    <!-- series selection is here (using blade foreach) -->
                    @foreach ($series as $aSeries)
                        <input type="checkbox" name="chosen_series" value="{{ $aSeries->id }}">
                            {{ $aSeries->name }}
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- list of the items for sale -->
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="">List by Item</h4>
            </div>
            <div class="panel-body">
                <!-- put listing details in here (using blade foreach) -->
                <table class="table table-hover">
                    <tr>
                        <th colspan='2' class="text-left">Name</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Price</th>
                    </tr>
                    @foreach($cards as $card)
                        <tr class="clickableRow" href="{{URL('market/' . $card->id .'')}}">
                            <td>
                                <img class="market-img image-responsive center-block hidden-xs" src="{{ asset('images/cards/'. $card->id . '.jpeg') }}">
                            </td>
                            <td>
                                <h5 class="text-left">{{ $card->name . ' ' . $card->serial_number . ' - ' . $card->serial_number }}</h5>
                                @if($card->series_id !=  'N/A')
                                    <h5>{{ $card->series->name }}</h5>
                                @else
                                    <h5>N/A</h5>
                                @endif
                            </td>
                            <td>
                                @if($card->listings->count() > 0)
                                    <h5 class="text-center market-text-available">{{ $card->listings->count() }}</h5>
                                @else
                                    <h5 class="text-center market-text-unavailable">{{ $card->listings->count() }}</h5>
                                @endif
                            </td>
                            <td>
                                @if($card->listings->count() > 0)
                                    <h5 class="text-center market-text-available">£{{ $card->listings()->min('listing_cost') }}</h5>
                                @else
                                    <h5 class="text-center market-text-unavailable">Unavailable</h5>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-md-offset-3">
        <nav>
            <!-- pagination links go here -->
            {{ $cards->links() }}
        </nav>
    </div>
@stop

@section('scripts')
@parent
<script type="text/javascript">
    $(function() {
        $(".clickableRow").click(function(e) {
            window.document.location = $(this).attr("href");
        });
    });
</script>
@stop