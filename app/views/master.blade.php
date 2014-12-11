<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Deck Citadel</title>
    {{ HTML::style('//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css') }}
    {{ HTML::style('//cdnjs.cloudflare.com/ajax/libs/selectize.js/0.11.2/css/selectize.bootstrap3.css') }}
    {{ HTML::style('css/styles.css') }}
    {{ HTML::style('//cdn.datatables.net/1.10.4/css/jquery.dataTables.css') }}

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-57164605-1', 'auto');
      ga('send', 'pageview');
    </script>

    <script type="text/javascript">
        function imgLoaded(img) {
            var imgWrapper = img.parentNode;
            imgWrapper.className += imgWrapper.className ? ' loaded' : 'loaded';
        };
    </script>
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ route('welcome') }}">Deck Citadel</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            @include('widgets.nav')
            <form class="hidden-xs navbar-form navbar-left" role="search" method="get" action="{{ route('cards.search') }}">
                 <div class="form-group">
                    <input type="text" id="search-bar" class="form-control dropdown" name="query" placeholder="Search" autocomplete='off'>
                    <div class="dropdown">
                        <ul class="dropdown-menu search-dropdown-menu">
                        </ul>
                    </div>
                </div>
                <button type="submit" id="search-button" class="btn btn-default hidden-xs"><span class="glyphicon glyphicon-search"></span></button>
            </form>
            <form class="navbar-form navbar-right">
                <div class="form-group">
                    @if( Auth::check() )
                        <button type="button" class="btn btn-default btn-sm" onClick="location.href='{{{ route('user.show', Auth::user()->username) }}}'">
                            <span class="glyphicon glyphicon-user"></span>
                            {{{ Auth::user()->username }}}
                        </button>
                        <button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-cog"></span>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li>{{ link_to('logout', 'Log Out' )}}</li>
                        </ul>
                    @else
                        <a href="{{ URL::route('login') }}" type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-user"></span>
                            Sign In
                        </a>

                    @endif
                </div>
            </form>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container-fluid">
    <div class="col-md-10 col-md-offset-1">
        <div class="row">
            <div class="page-header">
                @yield('header')
            </div>
        </div>
        @if( Session::has('message') )
            <div class='alert alert-success alert-dismissible' role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
                {{ Session::get('message') }}
            </div>
        @endif
        @if(Session::has('error'))
            <div class='alert alert-warning alert-dismissible' role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
                {{ Session::get('error') }}
            </div>
        @endif
        @yield('content')
        <!-- <button id='button'>Go!</button> -->
    </div>

    <span class="pull-right fixed">
        <a id="issue-report" href="mailto:support@deckcitadel.com?Subject=Issue%20Report"><h5>Report an issue <i class="glyphicon glyphicon glyphicon-exclamation-sign"></i></h5></a>
    </span>
</div>
</body>
@section('scripts')
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js', ["type" => "text/javascript"]) }}
    {{ HTML::script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js', ["type" => "text/javascript"]) }}
    {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/selectize.js/0.11.2/js/standalone/selectize.js', ["type" => "text/javascript"]) }}
    {{ HTML::script('/lib/jquery.dataTables.min.js', ["type" => "text/javascript"]) }}
    <script>
        // TODO: restrict search to over 2 characters
    </script>
@show
</html>
