@extends( 'master' )
@section( 'content' )
<div class="row">
    <div class="col-md-8 border">
        <div class="row">
            <div class="col-md-4">
                <img class="card-single-image responsive-image center-block" src="/images/cards/{{$card->id}}.jpeg" width="100%">
            </div>
            <div class="col-md-8">
            <!--  -->
            <?php $cheapest = $card->listings()->orderBy('listing_cost', 'asc')->first() ?>

                <h3>{{ $card->name }} - {{ $card->series->serial_number.$card->serial_number }}</h3>
                <table class="table table-striped">
                    <tr>
                        <td>Price</td>
                        <td>£{{ $cheapest->listing_cost }}</td>
                    </tr>
                    <tr>
                        <td>Item Condition</td>
                        <td>{{ $cheapest->condition }}</td>
                    </tr>
                    <tr>
                        <td>Postage</td>
                        @if( $cheapest->postage_cost == 0 )
                            <td><strong>Free</strong></td>
                        @else
                            <td>£{{ $cheapest->postage_cost }}</td>
                        @endif
                    </tr>
                    <tr>
                        <td>Item Location</td>
                        <td>{{ $cheapest->post_from }}</td>
                    </tr>
                    <tr>
                        <td>Returns</td>
                        @if( $card->returns )
                            <td>Returns accepted</td>
                        @else
                            <td>Returns not accepted</td>
                        @endif
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-md-offset-1 border">
        <button class="btn btn-primary btn-block btn-success">Add to basket</button><br>
        <button class="btn btn-primary btn-block btn-success">Buy it now</button><br>
        <button class="btn btn-primary btn-block btn-warning">Trade Request</button><br>
        <h4>Seller Information</h4>
    </div>
</div>
@stop