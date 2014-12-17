@extends( 'master' )

@section( 'content' )
<section id="login">
    <div class="row">
        <div class="col-xs-12">
            <div class="form-wrap">
                <h1>Login with your username</h1>
                {{ Form::open(array('id' => 'login')) }}
                <div class="form-group has-feedback">
                    {{ Form::text( 'username', $value = null, array('class' => 'form-control username-input', 'placeholder' => 'Username', 'id' => 'signup-username' )) }}
                </div>
                <div class="form-group has-feedback">
                    {{ Form::password('password',  array('class' => 'form-control', 'placeholder' => 'Password', 'id' => 'signup-password')) }}
                </div>
                    {{ Form::submit('Login', array( 'class' => 'btn btn-primary btn-lg btn-block', 'id' => 'btn-login' )) }}
                {{ Form::close() }}
                <a href="{{{ route('user.create') }}}" class="signup">Not registered? Sign up!</a>
                <a href="{{ route('password.remind') }}" class="signup">Forgotten password? Password reminder!</a>
                <a href="{{ route('username.remind') }}" class="signup">Forgotten username? Username reminder!</a>
            </div>
        </div>
    </div>
</section>
@stop

@section('scripts')
    @parent
    {{ HTML::script('js/validation.js') }}
@stop