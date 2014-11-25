@extends( 'master' )
@section( 'content' )
@if (Session::has('error'))
  {{ trans(Session::get('reason')) }}
@endif
<div class="row">
     <div class="col-xs-12">
          <div class="form-wrap">
               <h1>Reset Password</h1>
               {{ Form::open(array('route' => array('password.update', $token))) }}
               <div class="form-group has-feedback">
                    {{ Form::text( 'email', $value = null,  array('class' => 'form-control', 'placeholder' => 'Email', 'id' => 'signup-email')) }}
               </div>
               <div class="form-group has-feedback">
                    {{ Form::password('password',  array('class' => 'form-control', 'placeholder' => 'Password', 'id' => 'signup-password')) }}
               </div>
               <div class="form-group has-feedback">
                    {{ Form::password('password_confirmation',  array('class' => 'form-control', 'placeholder' => 'Password', 'id' => 'signup-password')) }}
               </div>
               {{ Form::hidden('token', $token) }}
               {{ Form::submit( 'Submit', array( 'class' => 'btn btn-custom btn-lg btn-block', 'id' => 'btn-signup' )) }}
               {{ Form::close() }}
          </div>
     </div>
</div>
@stop