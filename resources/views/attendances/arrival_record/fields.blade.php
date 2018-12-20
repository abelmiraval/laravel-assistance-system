<!-- Fecha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Fecha:') !!}
    {!! Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
   
</div>

<!-- Hora Entrada Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hour_entry', 'Hora Entrada:') !!}
    {!! Form::time('hour_entry', null, ['class' => 'form-control']) !!}
</div>

{{-- <!-- Hora Salida Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hour_departure', 'Hora Salida:') !!}
    {!! Form::time('hour_departure', null, ['class' => 'form-control']) !!}
</div>
 --}}

{{-- <!-- Tardanza Field -->
<div class="form-group col-sm-6">
    {!! Form::label('delay', 'Tardanza:') !!}
    {!! Form::time('delay', null, ['class' => 'form-control']) !!}
</div>
 --}}

<!-- Empleado Field -->
<div class="form-group col-sm-6">
     {!! Form::label('idemployee', 'Seleccione el Empleado:') !!}
{{--      {!! Form::select('idemployee',$employees, null,['class' => 'form-control']) !!} --}}
      <select id="idemployee" name="idemployee" class="form-control ">
            @foreach ($employees as $employee)
                 <option value="{{ $employee->id }}"> {{ $employee->surname_paternal.' '.$employee->surname_maternal.' '.$employee->name}}</option>
            @endforeach             
        </select> 
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! url('attendances/arrival_record') !!}" class="btn btn-default">Cancel</a>
</div>
