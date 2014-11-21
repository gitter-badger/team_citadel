<h3>{{ $card->name }} - {{ $card->series->serial_number.$card->serial_number }}</h3>
<table class="table table-striped">
    <tr>
        <td><strong>Price</strong></td>
        <td>£{{ $cheapest->listing_cost }}</td>
    </tr>
    <tr>
        <td><strong>Item Condition</td>
        <td>{{ $cheapest->condition }}</td>
    </tr>
    <tr>
        <td><strong>Postage</strong></td>
        @if( $cheapest->postage_cost == 0 )
            <td><strong>Free</strong></td>
        @else
            <td>£{{ $cheapest->postage_cost }}</td>
        @endif
    </tr>
    <tr>
        <td><strong>Seller</strong></td>
        <td>{{ $cheapest->seller->username }}</td>
    </tr>
    <tr>
        <td><strong>Item Location</strong></td>
        <td>{{ $cheapest->post_from }}</td>
    </tr>
    <tr>
        <td><strong>Returns</strong></td>
        @if( $card->returns )
            <td>Returns accepted</td>
        @else
            <td>Returns not accepted</td>
        @endif
    </tr>
</table>

<!-- PAY-PAL -->
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