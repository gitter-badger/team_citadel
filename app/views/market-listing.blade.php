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