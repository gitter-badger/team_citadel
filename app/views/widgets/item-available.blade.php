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
    <!-- TODO: add action -->
    {{ Form::open(['route' => 'addToBasket']) }}
        <button class="btn btn-primary btn-block btn-success small" name="submit" alt="add to cart">Add to cart</button>
        {{ Form::hidden('listing_id', $cheapest->id) }}
    {{ Form::close() }}
@else
    <strong> You must be signed in to buy the card </strong>
@endif
