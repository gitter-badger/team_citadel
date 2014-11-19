@extends( 'master' )
@section( 'content' )
    <div class="col-md-12">
        <div class="page-header">
            <h1>Weiβ Schwarz <small>- Market</small></h1>
        </div>
    </div>

    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Categories</h3>
            </div>
            <div class="panel-body">
                <div class="checkBox"> 
                    <!-- series selection is here (using blade foreach) -->
                    @foreach ($series as $aSeries)
                        <input type="checkbox" name="chosen_series" value="{{ $aSeries->id }}">
                            {{ $aSeries->name }}
                        <br>
                    @endforeach
                </div>
                <div class="pull-left">
                    <select class="sort" onChange="sortBy(this.value)">
                        <option>Sort by Relevance</option>
                        <option id="lowest"  value="lowest">Sort by Price - Lowest</option>
                        <option id="highest" value="highest">Sort by Price - Highest</option>
                        <option id="newest" value="newest">Sort by Condition - New First</option>
                        <option id="used" value="used">Sort by Condition - Used First</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- list of the items for sale -->
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="">List by Item</h4>
            </div>
            <div class="panel-body">
                <!-- put listing details in here (using blade foreach) -->
                @foreach($cards as $card)
                    <div class="row">
                        <div class="col-xs-5 col-sm-4 col-md-4 col-lg-2">
                            <!-- card image goes here -->
                            <a class="market-link" href="{{asset('market/' . $card->id .'')}}">
                                <img class="market-img  image-responsive center-block" src="{{ asset('images/cards/'. $card->id . '.jpeg') }}" width="100%">
                            </a>
                        </div>
                        <div class="col-xs-6 col-sm-8 col-md-8 col-lg-10">
                            <!-- Card name, serial number -->
                            <h5><a href="{{ asset('market/' . $card->id .'') }}">{{ $card->name }}</a></h5>

                            <!-- price goes here -->

                            <button class="btn btn-pimary btn-success more-detail-btn market-button" onClick="location.href='{{ asset('market/' . $card->id . '') }}'"> See cards for sale </button>
                        </div>
                    </div>
                    <br>
                @endforeach
            </div>
        </div>
    </div>

    <!-- pagination -->
    <div class="col-md-9 col-md-offset-3">
        <div class="well well-sm">
            <nav>
                <!-- pagination links go here -->
                {{ $cards->links() }}
            </nav>
        </div>
    </div>
@stop

@section('scripts')
<script type="text/javascript" src="{{ URL::asset('js/sort.js') }}"></script>
<script type="text/javascript">
    $(function(){
        var type = '{{-- $sortType --}}';
        if (type) {
            switch(type) {
                case 'highest':
                    $('#highest').prop('selected', true);
                    break;
                case 'lowest':
                    $('#lowest').prop('selected', true);
                    break;
                case 'newest':
                    $('#newest').prop('selected', true);
                    break;
                case 'used':
                    $('#used').prop('selected', true);
                    break;
            }
        }
    });
</script>
@stop