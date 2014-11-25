@extends( 'master' )
    @section('header')
        <h2>Profile {{{ $user->username }}}</h2>
    @stop

    @section('content')
        <div class="col-md-12">
            <div class="col-sm-4 col-md-3">
                <img class="responsive-image center-block" src="/images/users/{{$user->id}}.jpeg" width="70%">
            </div>

            <div class="col-sm-8 col-md-9 ">
                <ul class="nav nav-tabs nav-pill">
                    <li><a href="#profile-tab2" data-toggle="tab" >Profile<i class="fa"></i></a></li>
                    <li class="active"><a href="#wall-tab" data-toggle="tab">Wall<i class="fa"></i></a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane" id="profile-tab2">
                        <h3> {{{ $user->username }}} </h3>
                        <table class="table">
                            <tr>
                                <td width=10%>Title</td>
                                <td>{{{ $user->title }}}</td>
                            </tr>
                            <tr>
                                <td>Firstname</td>
                                <td>{{{ $user->first_name }}}</td>
                            </tr>
                            <tr>
                                <td>Lastname</td>
                                <td>{{{ $user->last_name }}} </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{{ $user->email_address }}}</td>
                            </tr>
                            <tr>
                                <td>DOB</td>
                                <td>{{{ $user->date_of_birth }}}</td>
                            </tr>
                            <tr>
                                <td>Location</td>
                                <td>{{{ $user->location }}}</td>
                            </tr>
                            <tr>
                                <td>Mobile Number</td>
                                <td>{{{ $user->mobile_phone }}}</td>
                            </tr>
                            <tr>
                                <td>Home Number</td>
                                <td>{{{ $user->home_telephone }}}</td>
                            </tr>
                        </table>
                    </div>

                    <div class="tab-pane active" id="wall-tab">
                        @foreach($decks as $deck)
                            <div class="row">
                                <h4>{{{ $deck->title }}}</h4>
                                <p>{{{ $deck->description }}}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @stop

    @section('scripts')
        @parent
    @stop
