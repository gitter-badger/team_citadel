@extends('master')
@section('content')
<section id="create-listing">
    <div class="col-md-8 col-md-offset-2">
        @if( $method )
            {{ Form::open(array('url' => 'listings', 'method' => 'post')) }}
                <div class="form-group">
                    <label>Card Name</label>
                    <select name="card_id" type="text" class="form-control">
                        @foreach( $cards as $card )
                            <option value="{{ $card->id }}">{{ $card->name }}</option>
                        @endforeach
                    </select> 
                </div>
                {{ Form::text('seller_id', $value = Auth::user()->id,  array('class' => 'hidden')) }}
                {{ Form::text('quantity', $value = 1, array('class' => 'hidden')) }}
                <div class="form-group">
                    <label for="pwd">Price</label>
                    <div class="input-group">
                         <div class="input-group-addon">£</div>
                        {{ Form::number('listing_cost', $value = null,  array('placeholder' => 'Price', 'class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="pwd">Postage Cost</label>
                    <div class="input-group">
                        <div class="input-group-addon">£</div>
                        {{ Form::number('postage_cost', $value = null,  array('placeholder' => 'Postage', 'class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group">
                    <label>Item Location</label>
                    {{ Form::text('post_from', $value = null,  array('placeholder' => 'Item Location', 'class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    <label>Returns</label>
                    {{ Form::select('returns', array('1' => 'Returns Accepted', '0' => 'Returns Not Accepted'), null ,array('class' => 'form-control'))}}
                </div>
                 <div class="form-group">
                    <label>Condition</label>
                    {{ Form::select('condition', array('New' => 'New', 'Used' => 'Used'), null ,array('class' => 'form-control'))}}
                </div>
                {{ Form::submit('List Card!', array('class' => 'btn btn-custom btn-lg btn-block')) }}
            {{ Form::close() }}
        @else
        <div class="row">
            <div class="col-md-4">
                <img class="card-single-image responsive-image center-block" src="/images/cards/{{$card->id}}.jpeg" width="80%">
            </div>
            <div class="col-md-8">
                <h3>{{ $listing->card->name }} - {{ $listing->card->serial_number }}</h3>
                <table class="table table-striped">
                    <tr>
                        <td>Item Condition</td>
                        <td>{{ $listing->item_condition }}</td>
                    </tr>
                    <tr>
                        <td>Quanity</td>
                        <td>{{ $listing->quantity }}</td>
                    </tr>
                    <tr>
                        <td>Postage</td>
                        @if( $listing->postage_cost == 0 )
                            <td><strong>Free</strong></td>
                        @else
                            <td>£{{ $listing->postage_cost }}</td>
                        @endif
                    </tr>
                    <tr>
                        <td>Item Location</td>
                        <td>{{ $listing->post_from }}</td>
                    </tr>
                    <tr>
                        <td>Returns</td>
                        @if( $listing->returns )
                            <td>Returns accepted</td>
                        @else
                            <td>Returns not accepted</td>
                        @endif
                    </tr>
                </table>
            </div>
        </div>
        @endif
    </div>
</section>
@stop