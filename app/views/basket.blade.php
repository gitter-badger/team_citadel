@extends('master')

@section('header')
<h2> Shopping Basket t<h2>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Postage</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($basketItems as $basketItem)
                            <tr>
                                <td class="col-sm-8 col-md-6">
                                    <div class="media">
                                        <img class="media-object card-single-image responsive-image pull-left" src="/images/cards/{{$basketItem->card->id}}.jpeg" width="12.5%" height="auto">
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="#">{{ $basketItem->card->name }}</a></h4>
                                            <h5 class="media-heading"> by <a href="#">{{ User::find($basketItem->seller_id)->username }}</a></h5>
                                            <td class="col-sm-1 col-md-1 text-center"><strong>£{{ $basketItem->listing_cost }}.00</strong></td>
                                            <td class="col-sm-1 col-md-1 text-center"><strong>£{{ $basketItem->postage_cost }}.00</strong></td>
                                            <td><icon class="glyphicon glyphicon-remove"></icon></td>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Overall cost and buttons section -->
                <div class="pull-right">
                <table>
                    <tr>
                        <td style="padding:0 15px 0 15px;">Subtotal</td>
                        <td><strong>£{{ $basketTotal }}.00</strong></td>
                    </tr>
                    <tr>
                        <td style="padding:0 15px 0 15px;">Estimated shipping</td>
                        <td><strong>£{{ $postageTotal }}.00</strong></td>
                    </tr>
                    <tr>
                        <td style="padding:0 15px 0 15px;">Total</td>
                        <td><strong>£{{$postageTotal + $basketTotal}}.00</td>
                    </tr>
                </table>
                <br>
                    <button type="button" class="btn btn-default">
                        <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                    </button>

                    <button type="button" class="btn btn-success">
                        Checkout <span class="glyphicon glyphicon-play"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    @parent
@stop
