@extends( 'master' )
@section( 'content' )
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="row">
            <div class="col-md-6">
                <img class="responsive-image center-block" src="/images/users/{{$user->id}}.jpeg" width="70%">
            </div>
            <div class="col-md-6">
                <h3> {{ $user->username }} </h3>
                <table class="table table-hover">
                    <tr>
                        <td>Title</td>
                        <td>{{ $user->title }}</td>
                    </tr>  
                    <tr>
                        <td>Firstname</td>
                        <td>{{ $user->first_name }}</td> 
                    </tr> 
                    <tr>
                        <td>Lastname</td>
                        <td>{{ $user->last_name}}
                    </tr> 
                    <tr>
                        <td>Email</td>
                        <td>{{ $user->email }}</td>
                    </tr> 
                    <tr>
                        <td>DOB</td>
                        <td>{{ $user->date_of_birth }}</td>
                    </tr>
                    <tr>
                        <td>Location</td>
                        <td>{{ $user->location }}</td>
                    </tr>  
                    <tr>
                        <td>Mobile Number</td>
                        <td>{{ $user->mobile_phone }}</td>
                    </tr>
                    <tr>
                        <td>Home Number</td>
                        <td>{{$user->home_telephone }}</td>
                    </tr>    
            </div>
        </div>
    </div>
</div>    
@stop
@section('scripts')
<script type="text/javascript" src="{{asset('js/validation.js')}}"></script>
@stop