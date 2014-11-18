@extends( 'master' )
@section( 'content' )
<section id="login">
    <div class="row">
        <div class="col-xs-12">
            <div class="form-wrap">
                <h1>Register here</h1>
                {{ Form::open(array('id' => 'register

                ')) }}
                <div class="form-group has-feedback">
                    {{ Form::text( 'first_name', $value = null, array('class' => 'form-control firstname-input', 'placeholder' => 'Firstname')) }}
                </div>
                <div class="form-group has-feedback">
                    {{ Form::text( 'last_name', $value = null, array('class' => 'form-control lastname-input', 'placeholder' => 'Lastname')) }}
                </div>
                <div class="form-group has-feedback">
                    {{ Form::text( 'username', $value = null, array('class' => 'form-control username-input', 'placeholder' => 'Username')) }}
                </div>
                <div class="form-group has-feedback">
                    {{ Form::text( 'email_address', $value = null,  array('class' => 'form-control', 'placeholder' => 'Email', 'id' => 'signup-email')) }}
                </div>
                <div class="form-group has-feedback">
                    {{ Form::password( 'password',  array('class' => 'form-control', 'placeholder' => 'Password')) }}
                </div>
                <div class="form-group has-feedback">
                    {{ Form::text( 'mobile_phone', $value = null, array('class' => 'form-control mobile-input', 'placeholder' => 'Mobile')) }}
                </div>
                <div class="form-group has-feedback">
                    {{ Form::text( 'home_telephone', $value = null, array('class' => 'form-control home-input', 'placeholder' => 'Home')) }}
                </div>
                    {{ Form::submit( 'Register', array( 'class' => 'btn btn-custom btn-lg btn-block', 'id' => 'btn-login' )) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</section>
@stop
@section('scripts')
<script type="text/javascript" src="{{asset('js/validation.js')}}"></script>
@stop