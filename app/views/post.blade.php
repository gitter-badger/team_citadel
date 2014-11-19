@extends( 'master' )
@section( 'content' )
<div class="row">
    <div class="col-md-8 border">
        <div class="row">
            <div class="col-md-4">
                <img class="card-single-image responsive-image center-block" src="/images/cards/{{$post->card->id}}.jpeg">
            </div>
            <div class="col-md-8">
                <h3>{{ $post->card->name }} - {{ $post->card->unique_identifier }}</h3>
                <table class="table table-striped">
                    <tr>
                        <td>Item Condition</td>
                        <td>{{ $post->item_condition }}</td>
                    </tr>
                    <tr>
                        <td>Quanity</td>
                        <td>{{ $post->quantity }}</td>
                    </tr>
                    <tr>
                        <td>Postage</td>
                        @if( $post->free_postage )
                            <td><strong>Free</strong></td>
                        @else
                            <td>£{{ $post->postage_cost }}</td>
                        @endif
                    </tr>
                    <tr>
                        <td>Item Location</td>
                        <td>{{ $post->item_location }}</td>
                    </tr>
                    <tr>
                        <td>Posts to</td>
                        <td>{{ $post->post_to }}</td>
                    </tr>
                    <tr>
                        <td>Dispatch Time</td>
                        <td>{{ $post->dispatch_time }}</td>
                    </tr>
                    <tr>
                        <td>Returns</td>
                        @if( $post->returns )
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
        <p class="price price-padding"><span class="smaller">£</span>{{ $post->card_price }}</p>
        <button class="btn btn-primary btn-block btn-success">Add to basket</button><br>
        <button class="btn btn-primary btn-block btn-success">Buy it now</button><br>
        <button class="btn btn-primary btn-block btn-warning">Trade Request</button><br>
        <h4>Seller Information</h4>
        <table class="table">
            <tr>
                <td>Username</td>
                <td>
                    <a href="{{url('user/'. $post->user->id )}}">{{{ $post->user->username }}}</a>
                </td>
            </tr>
            <tr>
                <td>Feedback</td>
                <td>100%</td>
            </tr>
        </table>
    </div>
</div>
@stop