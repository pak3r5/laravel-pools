<!-- League Id Field -->
<div class="form-group">
    {!! Form::label('league_id', 'League Id:') !!}
    <p>{{ $team->league->name }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $team->name }}</p>
</div>
