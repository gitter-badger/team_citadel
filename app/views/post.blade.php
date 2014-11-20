@extends( 'master' )
@section( 'content' )
<div class="row">
    <div class="col-md-8 border">
        <div class="row">
            <div class="col-md-4">
                <img class="card-single-image responsive-image center-block" src="/images/cards/{{$card->id}}.jpeg" width="100%">
            </div>
            <div class="col-md-8">
                @if($cheapest = $card->listings()->orderBy('listing_cost', 'asc')->first())
                    @include('widgets.item-available')
                @else
                    @include('widgets.item-unavailable')
                @endif
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
