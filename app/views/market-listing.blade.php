@extends( 'master' )
@section( 'content' )
<div class="row">
    <div class="col-md-8 col-md-offset-2 well">
        <div class="row">
            <div class="col-md-4">
                <img class="card-single-image responsive-image center-block" src="/images/cards/{{$card->id}}.jpeg" width="100%">
            </div>
            <div class="col-md-8">
            <!--  -->
                @if($cheapest = $card->listings()->orderBy('listing_cost', 'asc')->first())
                    @include('widgets.item-available')

                @else
                    @include('widgets.item-unavailable')
                @endif
                @if(Auth::check())
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                    <input type="hidden" name="cmd" value="_xclick">
                    <input type="hidden" name="business" value="{{ $cheapest->seller->paypal_email_address }}">
                    <input type="hidden" name="lc" value="US">
                    <input type="hidden" name="item_name" value="{{ $cheapest->condition . ' ' . htmlentities($card->name) }}">
                    <input type="hidden" name="item_number" value="{{ $cheapest->id }}">
                    <input type="hidden" name="amount" value="{{ $cheapest->listing_cost }}">
                    <input type="hidden" name="currency_code" value="GBP">
                    <input type="hidden" name="button_subtype" value="services">
                    <input type="hidden" name="no_note" value="0">
                    <input type="hidden" name="shipping" value="{{ $cheapest->postage_cost }}">
                    <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
                    <button class="btn btn-primary btn-block btn-success" name="submit" alt="PayPal - The safer, easier way to pay online!">Buy it now (Paypal)</button>
                    </form><br>
                @else
                    <strong> You must be signed in to buy the card </strong>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8 col-md-offset-2 well">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Listings</h3>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <th>Seller</th>
                        <th>Price</th>
                    </tr>
                    @foreach( $listings as $listing )
                        <tr>
                            <td>{{ $listing->card->name }}</td>
                            <td>{{ $listing->seller->username }}</td>
                            <td>£{{ $listing->listing_cost }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="">
            {{ $listings->links() }}
        </div>
    </div>
</div>
@stop