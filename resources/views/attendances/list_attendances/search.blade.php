{!! Form::open(array('url'=>'attendances/list_attendances','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}

		<div class="input-group">
			<div class="form-group col-sm-4">
			    {!! Form::label('idemployee', 'Seleccione el Empleado:') !!}
			{{--     {!! Form::select('idemployee',$employees, null,['class' => 'form-control']) !!} --}}
			    <select id="id_employee" name="idemployee" class="form-control ">
			    	<option >--Empleado--</option>
			        @foreach ($employees as $employee)
			         <option value="{{ $employee->id }}"> {{ $employee->surname_paternal.' '.$employee->surname_maternal.' '.$employee->name}}</option>
			        @endforeach             
			    </select>  
			</div>

			<div class="form-group col-sm-4">
			    {!! Form::label('date_start', 'Fecha Inicio:') !!}
			    {!! Form::date('date_start',null, ['class' => 'form-control','id'=>'id_date_start']) !!}   
			</div>

			<div class="form-group col-sm-4">
			    {!! Form::label('date_end', 'Fecha Final:') !!}
			    {!! Form::date('date_end',null, ['class' => 'form-control','id'=>'id_date_end']) !!}   
			</div>

			<span class="input-group-btn">
				<button type="submit" class="btn btn-primary" id="btn_search">Buscar</button>
			</span>
		</div>

{{Form::close()}}
