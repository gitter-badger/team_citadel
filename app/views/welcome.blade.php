@extends( 'master' )
@section('content')
    <div class="jumbotron" id="welcome-jumbotron">
      <h1 class="text-center">Welcome to Deck Citadel</h1>
      <p class="text-muted">something something something something</p>
    </div>

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->


        <!-- Three columns of text below the carousel -->
        <div class="row">
            <div class="col-lg-4">
                {{ HTML::image('images/welcome/ws-welcome.jpg', 'Weiss Schwarz', array('class' => 'img-circle', 'width' => '124px', 'height' => '124px')) }}
                <h2>Weiß Schwarz</h2>
                <p>DWeiß Schwarz (ヴァイスシュヴァルツ) is a Japanese collectible card game created by Bushiroad. The game is separated into Weiß-side and Schwarz-side. Weiß and Schwarz are German for white and black, respectively. As a general rule, series under Weiß usually have better card effects when compared to those series under Schwarz. However, with the newer series entering the respective sides, there is not much difference between the two.</p>
                <p><a class="btn btn-default" href="{{ URL::route('series.index') }}" role="button">View details »</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                {{ HTML::image('images/welcome/mtg-welcome.jpg', 'Magic the Gathering', array('class' => 'img-circle', 'width' => '124px', 'height' => '124px')) }}
                <h2>Magic The Gathering</h2>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
                <p><a class="btn btn-default" href="{{ URL::route('series.index') }}" role="button">View details »</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                {{ HTML::image('images/welcome/pokemon-welcome.jpg', 'pokemon', array('class' => 'img-circle', 'width' => '124px', 'height' => '124px')) }}
                <h2>Pokémon</h2>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
                <p><a class="btn btn-default" href="{{ URL::route('series.index') }}" role="button">View details »</a></p>
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->


        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">Card <span class="text-muted">Database</span></h2>
                <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
            </div>
            <div class="col-md-5">
                <img class="featurette-image img-responsive" data-src="holder.js/500x500/auto" alt="500x500" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNTAwIiBoZWlnaHQ9IjUwMCIgdmlld0JveD0iMCAwIDUwMCA1MDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iNTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjE5MC4zMTI1IiB5PSIyNTAiIHN0eWxlPSJmaWxsOiNBQUFBQUE7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LWZhbWlseTpBcmlhbCwgSGVsdmV0aWNhLCBPcGVuIFNhbnMsIHNhbnMtc2VyaWYsIG1vbm9zcGFjZTtmb250LXNpemU6MjNwdDtkb21pbmFudC1iYXNlbGluZTpjZW50cmFsIj41MDB4NTAwPC90ZXh0PjwvZz48L3N2Zz4=" data-holder-rendered="true">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-5">
                <img class="featurette-image img-responsive" data-src="holder.js/500x500/auto" alt="500x500" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNTAwIiBoZWlnaHQ9IjUwMCIgdmlld0JveD0iMCAwIDUwMCA1MDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iNTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjE5MC4zMTI1IiB5PSIyNTAiIHN0eWxlPSJmaWxsOiNBQUFBQUE7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LWZhbWlseTpBcmlhbCwgSGVsdmV0aWNhLCBPcGVuIFNhbnMsIHNhbnMtc2VyaWYsIG1vbm9zcGFjZTtmb250LXNpemU6MjNwdDtkb21pbmFudC1iYXNlbGluZTpjZW50cmFsIj41MDB4NTAwPC90ZXh0PjwvZz48L3N2Zz4=" data-holder-rendered="true">
            </div>
            <div class="col-md-7">
                <h2 class="featurette-heading">Card <span class="text-muted">Marketplace</span></h2>
                <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
            </div>
        </div>
        <!-- /END THE FEATURETTES -->

        <hr class="featurette-divider">

        <!-- FOOTER -->
        <footer>
            <p class="pull-right"><a href="http://getbootstrap.com/examples/carousel/#">Back to top</a></p>
            <p>© 2014 Company, Inc. · <a href="http://getbootstrap.com/examples/carousel/#">Privacy</a> · <a href="http://getbootstrap.com/examples/carousel/#">Terms</a></p>
        </footer>
@stop