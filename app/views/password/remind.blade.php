@extends( 'master')
@section( 'content' )
@if (Session::has('error'))
  {{ trans(Session::get('reason')) }}
@elseif (Session::has('success'))
  An email with the password reset has been sent.
@endif

<div class="row">
    <div class="col-xs-12">
        <div class="form-wrap">
            <h1>Reminder email</h1>
            {{ Form::open(array('route' => 'password.request')) }}
            <div class="form-group has-feedback">
                {{ Form::text( 'email', $value = null,  array('class' => 'form-control', 'placeholder' => 'Email', 'id' => 'signup-email')) }}
            </div>
            {{ Form::submit( 'Submit', array( 'class' => 'btn btn-custom btn-lg btn-block', 'id' => 'btn-signup' )) }}
            {{ Form::close() }}
        </div>
    </div>
</div>    
{{ Form::close() }}
@stop
@section('scripts')
    @parent
    {{ HTML::script('js/validation.js') }}
@stop
