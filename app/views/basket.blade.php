@extends('master')

@section('header')
<h2> Shopping Basket <h2>
@stop

@section('content')
    <div class="col-md-12">
        <table class="table table-bordered">
            <tr>
                <th width=5%>#</th>
                <th width=85%>item</th>
                <th width=10%>cost</th>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>

        <div class="col-md-2 pull-right">
            <table>
                <tr>
                    <th>Total = </td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="col-md-12">
      <button class="btn btn-success pull-right">Checkout</button>
    </div>
@stop

@section('scripts')
    @parent
@stop
