<ul class="nav navbar-nav">
	<li>
		<a href="" class="dropdown-toggle" data-toggle="dropdown">Games</a>
		<ul class="dropdown-menu">
			<li><a href="{{ URL::route('games.show', 'WeissSchwarz') }}">Weiβ Schwarz</a></li>
			<li><a href="{{ URL::route('games.show', 'MagicTheGathering') }}">Magic The Gathering</a></li>
			<li><a href="" class="disabled">Pokemon</a></li>
		</ul>
	</li>
	<li>
        <a href="{{ url('market') }}" class="disabled">Market</a>
    </li>
</ul>