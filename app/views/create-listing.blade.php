@extends('master')
@section('content')
<section id="create-listing">
    <h2>
        Create Listing
    </h2>
    @if( $method )
        {{ Form::open(array('url' => 'listings', 'method' => $method)) }}
            {{ Form::text('game_id', $value = null, array('class' => 'hidden')) }}
            {{ Form::text('user_id', $value = null, array('class' => 'hidden')) }}
            {{ Form::text('listing_cost', $value = null, array('placeholder' => 'Price')) }} <br>
            {{ Form::text('postage_cost', $value = null, array('placeholder' => 'Postage')) }} <br>
            {{ Form::text('post_from', $value = null, array('placeholder' => 'Item Location')) }}<br>
            {{ Form::select('returns', array('1' => 'Returns Accepted', '0' => 'Returns Not Accepted')) }} <br>
            {{ Form::submit('Save', array('class' => 'btn btn-default')) }}
        {{ Form::close() }}
    @else
        {{ $listing->id }} <br>
        {{ $listing->post_from }}
    @endif
</section>
@stop