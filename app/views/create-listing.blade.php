@extends('master')
@section('content')
<section id="create-listing">
    @if( $method )
        {{ Form::open(array('url' => 'listings', 'method' => 'post')) }}
            {{ Form::text('game_id', $value = null,  array('class' => 'hidden')) }}
            {{ Form::text('user_id', $value = null,  array('class' => 'hidden')) }}
            {{ Form::number('listing_cost', $value = null,  array('placeholder' => 'Price')) }}
            {{ Form::number('postage_cost', $value = null,  array('placeholder' => 'Postage')) }}
            {{ Form::text('post_from', $value = null,  array('placeholder' => 'Item Location')) }}
            {{ Form::text('buyer_id', $value = null,  array('class' => 'hidden')) }}
            {{ Form::select('returns', array('1' => 'Returns Accepted', '0' => 'Returns Not Accepted'))}}
            {{ Form::submit('Save') }}
        {{ Form::close() }}
    @else
        {{ $listing->id }}
        {{ $listing->post_from }}
    @endif
</section>
@stop