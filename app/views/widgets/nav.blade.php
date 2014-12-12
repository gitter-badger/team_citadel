<ul class="nav navbar-nav">
	<li>
		<a href="" class="dropdown-toggle" data-toggle="dropdown">Games</a>
		<ul class="dropdown-menu">
			<li><a href="{{ URL::route('games.show', 'weiss-schwarz') }}">Weiβ Schwarz</a></li>
			<li><a href="{{ URL::route('games.show', 'magic-the-gathering') }}">Magic The Gathering</a></li>
		</ul>
	</li>
	<li>
		<a href="{{ URL::route('decks') }}" class="dropdown">Decks</a>
	</li>
</ul>