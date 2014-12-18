@extends( 'master' )

@section('header')
    <h1 class="text-center">Register here</h1>
@stop

@section( 'content' )
    <div class="row" id="login">
        <div class="form-wrap">
            {{ Form::open(['route' => 'user.store', 'files'=>true, 'id' => 'register']) }}

                <div class="form-group has-feedback">
                    {{ Form::text( 'first_name', $value = null, ['class' => 'form-control firstname-input', 'placeholder' => 'Firstname', 'id' => 'reg-firstname']) }}
                </div>

                <div class="form-group has-feedback">
                    {{ Form::text( 'last_name', $value = null, ['class' => 'form-control lastname-input', 'placeholder' => 'Lastname', 'id' => 'reg-lastname']) }}
                </div>

                <div class="form-group has-feedback">
                    {{ Form::text( 'username', $value = null, ['class' => 'form-control username-input', 'placeholder' => 'Username', 'id' => 'reg-username']) }}
                </div>

                <div class="form-group has-feedback">
                    {{ Form::text( 'email', $value = null,  ['class' => 'form-control', 'placeholder' => 'Email', 'id' => 'signup-email']) }}
                </div>

                <div class="form-group has-feedback">
                    {{ Form::password( 'password',  ['class' => 'form-control', 'placeholder' => 'Password', 'id' => 'reg-password']) }}
                </div>

                <div class="form-group has-feedback">
                    {{ Form::label('image', 'Upload Image')}}
                    <input name="image" type="file" id="image" accept="image/*">
                </div>

                {{ Form::submit( 'Register', ['class' => 'btn btn-primary btn-lg btn-block', 'id' => 'btn-signup' ]) }}
            {{ Form::close() }}
        </div>
    </div>
@stop
@sect
ion('scripts')
    @parent
    {{ HTML::script('js/validation.js') }}
@stop