<table class="table table-responsive" id="attendances-table">
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Empleado</th>
            <th>Hora Entrada</th>
            <th>Hora Salida</th>
        </tr>
    </thead>
    <tbody>
    @foreach($attendances as $attendance)
        <tr>
            <td>{!! $attendance->date !!}</td>
            <td>{!! $attendance->employee->surname_paternal.' '.$attendance->employee->surname_maternal.' ' .$attendance->employee->name !!}</td> 
            <td>{!! $attendance->hour_entry !!}</td>
            <td>{!! $attendance->hour_departure !!}</td>
    
            <td>
            {!! Form::open(['url' => ['attendances/arrival_record', $attendance->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    
                     <a href="{!! URL::action('AttendancesController@editList', [$attendance->id]) !!}" class='btn btn-success btn-sm'><i class="glyphicon glyphicon-edit"></i></a>
                    
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Estas seguro de querer eliminarlo')"]) !!}
                </div>
            {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>