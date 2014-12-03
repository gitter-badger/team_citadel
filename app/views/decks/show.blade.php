@extends('master')

    @section('header')
    @stop

    @section('content')
        {{ Form::open(['route' => 'addCard']) }}

                <div class="form-group">

                <div class="row">
                         <div class="col-md-12">
                            {{ Form::label('Series') }}
                            <p>
                                <input type="list" name="input" placeholder="Type Something" list="seriesresults" autocomplete="off" class="form-control" id="seriesdata" size="40" >
                                <datalist id="seriesresults">
                                    @foreach($series as $aSeries)
                                        <option value="{{ $aSeries->name }}" label="{{ $aSeries->serial_number }}">{{ $aSeries->name }}</option>
                                    @endforeach
                                </datalist>
                            </p>
                        </div> <!-- /col-md-6 -->
                    </div> <!-- /.row -->

                    <div class="row">
                         <div class="col-md-12">
                            {{ Form::label('Cards') }}
                            <p>
                                <input type="text" id="cardresults" placeholder="e.g. datalist" class="form-control"
                                name="term" data-provide="typeahead" autocomplete="off">
                            </p>
                            <a class="btn button-success">Add Card</a>
                        </div> <!-- /col-md-6 -->
                    </div> <!-- /.row -->
                </div> <!-- /forn-group -->

                <div class="well">
                        <select id="searchbox" name="q" placeholder="Search products or categories..." class="form-control"></select>
                </div>

        {{ Form::close() }}
    @stop

    @section('scripts')
        @parent
        <script type="text/javascript" src="{{asset('js/input-select-dropdown.js')}}"></script>
        <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/selectize.js/0.11.2/js/standalone/selectize.js"></script>
    @stop