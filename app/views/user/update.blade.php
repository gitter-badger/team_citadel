@extends( 'master' )
@section( 'content' )

<section id="Edit">
    <div class="row">
        <div class="col-xs-12">
            <div class="form-wrap">
                <h1>Edit here</h1>
                {{ Form::model($user, array('method' => 'post', 'files'=>true, 'route' => array('user.update' , $user->username))) }}
                <input type="hidden" name="_method" value="put">
                <div class="form-group has-feedback">
                    {{ Form::text( 'title', $value = $user->title, array('class' => 'form-control firstname-input', 'placeholder' => 'Title', 'id' => 'edit-title')) }}
                </div>
                <div class="form-group has-feedback">
                    {{ Form::text( 'first_name', $value = $user->first_name, array('class' => 'form-control firstname-input', 'placeholder' => 'Firstname', 'id' => 'edit-firstname')) }}
                </div>
                <div class="form-group has-feedback">
                    {{ Form::text( 'last_name', $value = $user->last_name, array('class' => 'form-control lastname-input', 'placeholder' => 'Lastname', 'id' => 'edit-lastname')) }}
                </div>
                <div class="form-group has-feedback">
                    {{ Form::text( 'username', $value = $user->username, array('class' => 'form-control username-input', 'placeholder' => 'Username', 'id' => 'edit-username')) }}
                </div>
                <div class="form-group has-feedback">
                    {{ Form::text( 'email', $value = $user->email,  array('class' => 'form-control', 'placeholder' => 'Email', 'id' => 'edit-email')) }}
                </div>
                <div class="form-group has-feedback">
                    {{ Form::text( 'location', $value = $user->location,  array('class' => 'form-control', 'placeholder' => 'Location', 'id' => 'edit-location')) }}
                </div>
                <div class="form-group has-feedback">
                    {{ Form::text( 'date_of_birth', $value = $user->date_of_birth,  array('class' => 'form-control', 'placeholder' => 'D.O.B', 'id' => 'edit-date_of_birth')) }}
                </div>
                <div class="form-group has-feedback">

                    {{ Form::label('image', 'Upload Image')}}
                    <input name="image" type="file" id="image" accept="image/*">
                </div>
                    {{ Form::submit( 'Update', array( 'class' => 'btn btn-custom btn-lg btn-block', 'id' => 'btn-signup' )) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</section>
@stop
@section('scripts')
<script type="text/javascript" src="{{asset('js/validation.js')}}"></script>
@stop