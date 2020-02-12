<!-- Short Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('short_name', 'Short Name:') !!}
    {!! Form::text('short_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('country.countries.index') }}" class="btn btn-default">Cancel</a>
</div>
