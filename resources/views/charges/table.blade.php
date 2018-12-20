<table class="table table-responsive" id="cargos-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($cargos as $cargo)
        <tr>
            <td>{!! $cargo->name !!}</td>
            <td>{!! $cargo->description !!}</td>
            <td>
                {!! Form::open(['route' => ['charges.destroy', $cargo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('charges.show', [$cargo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('charges.edit', [$cargo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    
                {{--     {!!
                     Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Esta seguro de querer eliminarlo?')"])
                    !!} --}}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>