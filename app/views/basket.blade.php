@extends('master')

@section('header')
<h2> Shopping Basket <h2>
@stop

@section('content')
    <div class="col-md-12">
        <table class="table table-bordered">
            <tr>
                <th with=10%>#</th>
                <th width=80%>item</th>
                <th width=10%>cost</th>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
@stop

@section('scripts')
    @parent
    <script type="text/javascript" src="{{asset('js/validation.js')}}"></script>
@stop
