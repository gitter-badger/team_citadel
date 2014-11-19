@extends('master')
@section('content')
<section id="create-listing">
    {{ Form::open(array('url' => 'listing/create', 'method' => 'post')) }}
        {{ Form::text('game_id', array('class' => 'hidden')) }}
        {{ Form::text('user_id', array('class' => 'hidden')) }}
        {{ Form::number('listing_cost', array('placeholder' => 'Price')) }}
        {{ Form::number('postage_cost', array('placeholder' => 'Postage')) }}
        {{ Form::text('post_from', array('placeholder' => 'Item Location')}}
        {{ Form::text('buyer_id', array('class' => 'hidden')) }}
        {{ Form::select('returns', array('1' => 'Returns Accepted', '0' => 'Returns Not Accepted'))}}
    {{ Form::close() }}
</section>
@stop