<!-- Dia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Hora Entrada Field -->
<div class="form-group col-sm-6">
    {!! Form::label('surname_paternal', 'Apellido Patero:') !!}
    {!! Form::text('surname_paternal', null, ['class' => 'form-control']) !!}
</div>

<!-- Hora Salida Field -->
<div class="form-group col-sm-6">
    {!! Form::label('surname_maternal', 'Apellido Materno:') !!}
    {!! Form::text('surname_maternal', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('dni', 'DNI:') !!}
    {!! Form::number('dni', null, ['class' => 'form-control']) !!}
</div>


<!-- Idcargos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idcharge', 'Seleccione el Cargo:') !!}
     {!! Form::select('idcharge',$charges, null,['class' => 'form-control']) !!}
  
 
  {{--   <select id="idcharge" name="idcharge" class="form-control ">
        @foreach ($charges as $charge)
         <option value="{{ $charge->id }}"> {{ $charge->name}}</option>
        @endforeach             
    </select>   --}}
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6 hidden">
    {!! Form::label('state', 'Estado:') !!}
    {!! Form::text('state', 1, ['class' => 'form-control']) !!}
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('employees.index') !!}" class="btn btn-default">Cancel</a>
</div>
