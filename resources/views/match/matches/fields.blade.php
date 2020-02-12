<!-- Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('number', 'Number:') !!}
    {!! Form::number('number', null, ['class' => 'form-control']) !!}
</div>

<!-- Matchweek Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('matchweek_id', 'Matchweek Id:') !!}
    {!! Form::number('matchweek_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('match.matches.index') }}" class="btn btn-default">Cancel</a>
</div>
