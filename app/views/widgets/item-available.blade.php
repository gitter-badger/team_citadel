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