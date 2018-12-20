<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $schedule->id !!}</p>
</div>

<!-- Dia Field -->
<div class="form-group">
    {!! Form::label('dia', 'Dia:') !!}
    <p>{!! $schedule->day !!}</p>
</div>

<!-- Hora Entrada Field -->
<div class="form-group">
    {!! Form::label('hour_entry', 'Hora Entrada:') !!}
    <p>{!! $schedule->hoour_entry !!}</p>
</div>

<!-- Hora Salida Field -->
<div class="form-group">
    {!! Form::label('hora_salida', 'Hora Salida:') !!}
    <p>{!! $schedule->hour_departure !!}</p>
</div>

<!-- Estado Field -->
<div class="form-group">
    {!! Form::label('state', 'Estado:') !!}
    <p>{!! $schedule->state !!}</p>
</div>

<!-- Idcargos Field -->
<div class="form-group">
    {!! Form::label('idcharge', 'Cargo:') !!}
    <p>{!! $schedule->idcharge !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $schedule->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $schedule->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $schedule->deleted_at !!}</p>
</div>

