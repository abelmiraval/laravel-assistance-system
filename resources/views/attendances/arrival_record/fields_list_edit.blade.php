

<!-- Hora Entrada Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hour_entry', 'Hora Entrada:') !!}
    {!! Form::time('hour_entry', null, ['class' => 'form-control']) !!}
</div>


<!-- Hora Salida Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hour_departure', 'Hora Salida:') !!}
    {!! Form::time('hour_departure', null, ['class' => 'form-control']) !!}
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! url('attendances/arrival_record') !!}" class="btn btn-default">Cancel</a>
</div>
