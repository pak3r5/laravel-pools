<li class="{{ Request::is('country/countries*') ? 'active' : '' }}">
    <a href="{{ route('country.countries.index') }}"><i class="fa fa-edit"></i><span>Countries</span></a>
</li>

<li class="{{ Request::is('league/leagues*') ? 'active' : '' }}">
    <a href="{{ route('league.leagues.index') }}"><i class="fa fa-edit"></i><span>Leagues</span></a>
</li>

<li class="{{ Request::is('team/teams*') ? 'active' : '' }}">
    <a href="{{ route('team.teams.index') }}"><i class="fa fa-edit"></i><span>Teams</span></a>
</li>

<li class="{{ Request::is('matchweek/matchweeks*') ? 'active' : '' }}">
    <a href="{{ route('matchweek.matchweeks.index') }}"><i class="fa fa-edit"></i><span>Matchweeks</span></a>
</li>

<li class="{{ Request::is('match/matches*') ? 'active' : '' }}">
    <a href="{{ route('match.matches.index') }}"><i class="fa fa-edit"></i><span>Matches</span></a>
</li>

<li class="{{ Request::is('result/results*') ? 'active' : '' }}">
    <a href="{{ route('result.results.index') }}"><i class="fa fa-edit"></i><span>Results</span></a>
</li>

