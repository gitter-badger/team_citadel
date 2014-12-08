@extends( 'master')

@section('header')
    <h1 class="text-center">Reminder email</h1>
@stop

@section( 'content' )
    @if (Session::has('error'))
        {{ trans(Session::get('reason')) }}
    @elseif (Session::has('success'))
        An email with the password reset has been sent.
    @endif

    <div class="col-md-6 col-md-offset-3">
        <div class="form-wrap">
            {{ Form::open(array('route' => 'password.request')) }}
                <div class="form-group has-feedback">
                    {{ Form::text( 'email', $value = null,  ['class' => 'form-control', 'placeholder' => 'Email', 'id' => 'signup-email']) }}
                </div>
                {{ Form::submit( 'Submit', [ 'class' => 'btn btn-custom btn-lg btn-block', 'id' => 'btn-signup' ]) }}
            {{ Form::close() }}
        </div>
    </div>
@stop

@section('scripts')
    @parent
    {{ HTML::script('js/validation.js') }}
@stop
