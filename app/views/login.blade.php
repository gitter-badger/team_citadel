@extends( 'master' )
@section( 'content' )
<section id="login">
	<div class="row">
		<div class="col-xs-12">
			<div class="form-wrap">
				<h1>Login with your username</h1>
				{{ Form::open(array('id' => 'login')) }}
				<div class="form-group has-feedback">
					{{ Form::text( 'username', $value = null, array('class' => 'form-control username-input', 'placeholder' => 'Username')) }}
				</div>
				<div class="form-group has-feedback">
					{{ Form::password('password',  array('class' => 'form-control', 'placeholder' => 'Password')) }}
				</div>
					{{ Form::submit('Log in', array( 'class' => 'btn btn-custom btn-lg btn-block', 'id' => 'btn-login' )) }}
				{{ Form::close() }}
				<a href="" class="signup">Not registered? Sign up!</a>
			</div>
		</div>
	</div>
</section>

<div class="modal fade forget-modal" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">×</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">Recovery password</h4>
			</div>
			<div class="modal-body">
				<p>Type your email account</p>
				<input type="email" name="recovery-email" id="recovery-email" class="form-control" autocomplete="off">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-custom">Recovery</button>
			</div>
		</div> <!-- /.modal-content -->
	</div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->
@stop
@section('scripts')
<script type="text/javascript" src="{{asset('js/validation.js')}}"></script>
@stop