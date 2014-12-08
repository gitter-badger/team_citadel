<ul class="nav navbar-nav">
	<li>
		<a href="" class="dropdown-toggle" data-toggle="dropdown">Games</a>
		<ul class="dropdown-menu">
			<li><a href="{{ URL::route('games.show', 'WeissSchwarz') }}">Weiβ Schwarz</a></li>
			<li><a href="{{ URL::route('games.show', 'MagicTheGathering') }}">Magic The Gathering</a></li>
		</ul>
	</li>
</ul>