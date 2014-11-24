@extends( 'master' )
@section('header')
    <h2>Profile {{{ $user->username }}}</h2>
@stop

@section('content')
    <div class="col-md-12">
        <div class="col-md-2">
            <img class="responsive-image center-block" src="/images/users/{{$user->id}}.jpeg" width="70%">
        </div>

        <div class="col-md-10">
            <ul class="nav nav-tabs nav-justified">
                <li class="active"><a href="#profile-tab" data-toggle="tab">Profile<i class="fa"></i></a></li>
                <li><a href="#wall-tab" data-toggle="tab">Wall<i class="fa"></i></a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="profile-tab">
                    <h3> {{ $user->username }} </h3>
                    <table class="table">
                        <tr>
                            <td width=10%>Title</td>
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
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
