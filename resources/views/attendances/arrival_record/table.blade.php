<table class="table table-responsive" id="attendances-table">
    <thead>
        <tr>
        <th>Fecha</th>
        <th>Hora Entrada</th>
        <th>Empleado</th>
        <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($attendances as $attendance)
        <tr>
            <td>{!! $attendance->date !!}</td>
            <td>{!! $attendance->hour_entry !!}</td>
            <td>{!! $attendance->employee->name !!}</td>
         
            <td></td>
            
            <td>
               {{--  {!! Form::open(['route' => ['attendances.destroy', $attendance->id], 'method' => 'delete']) !!} --}}
                <div class='btn-group'>
                  {{--   <a href="{!! route('attendances.show', [$attendance->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> --}}

                  {{-- {{URL::action('SubTipoCorrespondenciaController@edit',$stc->idsub_tipo_correspondencia)}}"
                  --}}   
                      <a href="{!! URL::action('AttendancesController@edit', [$attendance->id]) !!}" class='btn btn-success btn-sm'><i class="glyphicon glyphicon-edit"></i>Registrar salida</a>
                    
                    {{-- {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas seguro de querer eliminarlo')"]) !!} --}}
                </div>
              {{--   {!! Form::close() !!} --}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>