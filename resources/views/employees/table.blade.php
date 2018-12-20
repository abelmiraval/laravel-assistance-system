<table class="table table-responsive" id="employees-table">
    <thead>
        <tr>
        <th>Nombre</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>DNI</th>
        <th>Estado</th>
        <th>Cargo</th>
        <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($employees as $employee)
        <tr>
            <td>{!! $employee->name !!}</td>
            <td>{!! $employee->surname_paternal !!}</td>
            <td>{!! $employee->surname_maternal!!}</td>
            <td>{!! $employee->dni !!}</td>
            <td>{!! $employee->state !!}</td>
            <td>{!! $employee->charge->name!!}</td>
            
            <td>
                {!! Form::open(['route' => ['employees.destroy', $employee->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('employees.show', [$employee->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('employees.edit', [$employee->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas seguro de querer eliminarlo')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>