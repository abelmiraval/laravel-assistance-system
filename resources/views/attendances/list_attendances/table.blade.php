<table class="table table-responsive" id="attendances-table">
    <thead>
        <tr>
          <th>DNI</th>
          <th>Empleado</th>
          <th>Horas no Trabajadas</th>
          <th>Asistencias</th>
        </tr>
    </thead>
    <tbody>
    @foreach($attendances as $attendance)
        <tr>
            <td>{!! $attendance->dni !!}</td>
            <td>{!! $attendance->employee !!}</td>
            <td>{!! $attendance->totalHours !!}</td>
            <td>  
                <a href="{{URL::action('AttendancesController@show',$attendance->idemployee)}}"><button class="btn btn-primary">Detalle</button></a>                     
            </td>
        </tr>
    @endforeach
    </tbody>
</table>