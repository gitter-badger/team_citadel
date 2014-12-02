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
                                <input type="text" name="input" id="search-cards" placeholder="Type Something" list="carddata" autocomplete="off" class="form-control" data-id="{{ $deck->game_id }}">
                                <datalist id="carddata"></datalist>
                            </p>
                            <a class="btn button-success">Add Card</a>
                        </div> <!-- /col-md-6 -->
                    </div> <!-- /.row -->
                </div> <!-- /forn-group -->

                 <label for="ajax">Pick an HTML Element (options loaded using AJAX)</label>
                    <input type="text" id="ajax" list="json-datalist" placeholder="e.g. datalist">
                  <datalist id="json-datalist"></datalist>

        {{ Form::close() }}
    @stop

    @section('scripts')
        @parent
        <script type="text/javascript" src="{{asset('js/input-select-dropdown.js')}}"></script>
    @stop