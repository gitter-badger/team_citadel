@extends( 'master' )

@section('header')
    <h1 class="text-center">Reset Password</h1>
@stop

@section( 'content' )
     @if (Session::has('error'))
       {{ trans(Session::get('reason')) }}
     @endif

     <div class="col-md-6 col-md-offset-3">
          <div class="form-wrap">
               {{ Form::open(['route' => ['password.update', $token]]) }}
                    <div class="form-group has-feedback">
                         {{ Form::text( 'email', $value = null, ['class' => 'form-control', 'placeholder' => 'Email', 'id' => 'signup-email']) }}
                    </div>
                    <div class="form-group has-feedback">
                         {{ Form::password('password',  ['class' => 'form-control', 'placeholder' => 'Password', 'id' => 'signup-password']) }}
                    </div>
                    <div class="form-group has-feedback">
                         {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Password', 'id' => 'signup-password']) }}
                    </div>
                    {{ Form::hidden('token', $token) }}
                    {{ Form::submit( 'Submit', ['class' => 'btn btn-primary btn-lg btn-block', 'id' => 'btn-signup' ]) }}
               {{ Form::close() }}
          </div>
     </div>
@stop