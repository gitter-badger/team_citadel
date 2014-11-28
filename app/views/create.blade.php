@extends( 'master' )
@section( 'content' )
<section id="login">
    <div class="row">
        <div class="col-xs-12">
            <div class="form-wrap">
                <h1>Register here</h1>
                {{ Form::open(array('action' => 'UsersController@store', 'files'=>true, 'id' => 'register')) }}
                <div class="form-group has-feedback">
                    {{ Form::text( 'first_name', $value = null, array('class' => 'form-control firstname-input', 'placeholder' => 'Firstname', 'id' => 'reg-firstname')) }}
                </div>
                <div class="form-group has-feedback">
                    {{ Form::text( 'last_name', $value = null, array('class' => 'form-control lastname-input', 'placeholder' => 'Lastname', 'id' => 'reg-lastname')) }}
                </div>
                <div class="form-group has-feedback">
                    {{ Form::text( 'username', $value = null, array('class' => 'form-control username-input', 'placeholder' => 'Username', 'id' => 'reg-username')) }}
                </div>
                <div class="form-group has-feedback">
                    {{ Form::text( 'email', $value = null,  array('class' => 'form-control', 'placeholder' => 'Email', 'id' => 'signup-email')) }}
                </div>
                <div class="form-group has-feedback">
                    {{ Form::password( 'password',  array('class' => 'form-control', 'placeholder' => 'Password', 'id' => 'reg-password')) }}
                </div>
                <div class="form-group has-feedback">
                    {{ Form::label('image', 'Upload Image')}}
                    {{ Form::file('image') }}
                </div>
                    {{ Form::submit( 'Register', array( 'class' => 'btn btn-custom btn-lg btn-block', 'id' => 'btn-signup' )) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</section>
@stop