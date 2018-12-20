

<!-- Hora Salida Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hour_departure', 'Hora Salida:') !!}
    {!! Form::time('hour_departure', null, ['class' => 'form-control']) !!}
</div>


{{-- <!-- Tardanza Field -->
<div class="form-group col-sm-6">
    {!! Form::label('delay', 'Tardanza:') !!}
    {!! Form::time('delay', null, ['class' => 'form-control']) !!}
</div>
 --}}

{{-- <!-- Empleado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idemployee', 'Seleccione el Empleado:') !!}
     {!! Form::select('idemployee',$employees, null,['class' => 'form-control']) !!}
    <select id="idcharge" name="idcharge" class="form-control ">
        @foreach ($charges as $charge)
         <option value="{{ $charge->id }}"> {{ $charge->name}}</option>
        @endforeach             
    </select>  
</div>
 --}}


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! url('attendances.index') !!}" class="btn btn-default">Cancel</a>
</div>
