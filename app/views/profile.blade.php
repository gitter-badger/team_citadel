@extends( 'master' )
@section( 'content' )
<div class="row">
    <div class="col-md-8 border">
        <div class="row">
            <div class="col-md-4">
                <img class="card-single-image responsive-image center-block" src="/images/users/{{$user->id}}.jpg" width="100%">
            </div>
            <div class="col-md-8">
                <h3> {{ $user->username }} </h3>
                <table class="table table-striped">
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
                        <td>{{$user->email_address}}
                    </tr> 
                    <tr>
                        <td>DOB</td>
                        <td>{{$user->date_of_birth}}
                    </tr>
                    <tr>
                        <td>Location</td>
                        <td>{{$user->location}}</td>
                    </tr>  
                    <tr>
                        <td>Mobile Number</td>
                        <td>{{$user->mobile_phone}}
                    </tr>
                    <tr>
                        <td>Home Number</td>
                        <td>{{$user->home_telephone}}
                    </tr>    
            </div>
        </div>
    </div>
</div>    
@stop