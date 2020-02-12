<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $result->id }}</p>
</div>

<!-- Uuid Field -->
<div class="form-group">
    {!! Form::label('uuid', 'Uuid:') !!}
    <p>{{ $result->uuid }}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
    <p>{{ $result->type }}</p>
</div>

<!-- Team Id Field -->
<div class="form-group">
    {!! Form::label('team_id', 'Team Id:') !!}
    <p>{{ $result->team_id }}</p>
</div>

<!-- Score Field -->
<div class="form-group">
    {!! Form::label('score', 'Score:') !!}
    <p>{{ $result->score }}</p>
</div>

<!-- Match Id Field -->
<div class="form-group">
    {!! Form::label('match_id', 'Match Id:') !!}
    <p>{{ $result->match_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $result->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $result->updated_at }}</p>
</div>

