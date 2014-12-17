@extends('master')

    @section('header')
        @if($method == 'reply')
            <h2 class="text-center">Create Message</h2>
        @endif
    @stop

    @section('content')

        <div class="col-md-6 col-md-offset-3">
            {{ Form::model($message, ['route' => 'post.message']) }}

                {{ Form::token() }}

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            {{ Form::label('Recipient') }}
                        </div>
                        <div class="col-md-9">
                            {{ Form::text('user_id', $value = $username, ['class' => 'form-control']) }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            {{ Form::label('title', 'Subject')}}
                        </div>
                        <div class="col-md-9">
                            {{ Form::text('name', '', ['class' => 'form-control']) }}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            {{ Form::label('content', 'Content') }}
                        </div>
                        <div class="col-md-9">
                            {{ Form::textarea('content', '', ['class' => 'form-control']) }}
                            {{ Form::submit('Send Message', ['class' => 'btn btn-primary btn-md btn-block post-border'])}}
                        </div>
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    @stop

    @section('scripts')
        @parent
    @stop