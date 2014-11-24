@extends( 'master' )
@section( 'content' )
<div class="row">
    <div class="col-md-8 col-md-offset-2 well">
        <div class="row">
            <div class="col-md-4">
                <img class="card-single-image responsive-image center-block" src="/images/cards/{{$card->id}}.jpeg" width="100%">
            </div>
            <div class="col-md-8">
                @if($cheapest = $card->listings()->orderBy('listing_cost', 'asc')->where('sales_status', 'listed')->first())
                    <!-- Get the cheapest listing of this card -->
                    @include('widgets.item-available')
                @else
                    <!-- If there are no listings show order page -->
                    @include('widgets.item-unavailable')
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
                        @if(Auth::check())
                            <!-- Check if the user is logged in before showing the paypal column -->
                            <th>PayPal</th>
                        @endif
                    </tr>
                    <!-- Lists all listings with this card id -->
                    @foreach($listings as $listing)
                        @if($listing->sales_status == 'listed' && !($listing->id == $cheapest->id))
                            <tr>
                                <td>{{ $listing->card->name }}</td>
                                <td>{{ $listing->seller->username }}</td>
                                <td><strong> £{{ $listing->listing_cost }} </strong> +  <small>£{{ $listing->postage_cost }} postage</small></td>
                                @if(Auth::check())
                                    <!-- If user is logged in show link to purchase listing -->
                                    <td>
                                        <!-- TODO: add action -->
                                        {{ Form::open(['route' => 'addToBasket']) }}
                                            <button class="btn btn-primary btn-block btn-success small" name="submit" alt="add to cart">Add to cart</button>
                                        {{ Form::close() }}
                                        <!-- <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                        <input type="hidden" name="cmd" value="_xclick">
                                        <input type="hidden" name="business" value="{{ $listing->seller->paypal_email_address }}">
                                        <input type="hidden" name="lc" value="US">
                                        <input type="hidden" name="item_name" value="{{ $listing->condition . ' ' . htmlentities($card->name) }}">
                                        <input type="hidden" name="item_number" value="{{ $listing->id }}">
                                        <input type="hidden" name="amount" value="{{ $listing->listing_cost }}">
                                        <input type="hidden" name="currency_code" value="GBP">
                                        <input type="hidden" name="button_subtype" value="services">
                                        <input type="hidden" name="no_note" value="0">
                                        <input type="hidden" name="shipping" value="{{ $listing->postage_cost }}">
                                        <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
                                        <button class="btn btn-sm btn-primary btn-block btn-success small" name="submit" alt="PayPal - The safer, easier way to pay online!">Buy now</button>
                                        </form><br>-->
                                    </td>
                                @endif
                            </tr>
                        @endif
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
