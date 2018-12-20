

<li class="{{ Request::is('charges*') ? 'active' : '' }}">
    <a href="{!! route('charges.index') !!}"><i class="fa fa-edit"></i><span>Cargos</span></a>
</li>


<li class="{{ Request::is('schedules*') ? 'active' : '' }}">
    <a href="{!! route('schedules.index') !!}"><i class="fa fa-edit"></i><span>Horarios</span></a>
</li>

{{-- <li class="{{ Request::is('charges-schedules*') ? 'active' : '' }}">
    <a href="{!! route('charges-schedules.index') !!}"><i class="fa fa-edit"></i><span>Cargos Horarios</span></a>
</li> --}}

<li class="{{ Request::is('employees*') ? 'active' : '' }}">
    <a href="{!! route('employees.index') !!}"><i class="fa fa-edit"></i><span>Empleados</span></a>
</li>


<li class="treeview">
    <a href="#">
        <i class="fa fa-list-alt"></i>
            <span>Asistencias</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>       
     <ul class="treeview-menu">
        <li><a href="{!! url('attendances/arrival_record') !!}"><i class="fa fa-circle-o"></i>Registro de Asistencias</a></li>
        <li><a href="{!! url('attendances/list_attendances') !!}" onclick=""><i class="fa fa-circle-o"></i> Reporte de Asistencias</a></li>
     </ul>
</li>
{{-- 
<li class="{{ Request::is('attendances*') ? 'active' : '' }}">
    <a href="{!! route('attendances.index') !!}"><i class="fa fa-edit"></i><span>Asistencias</span></a>
</li>
 --}}
{{-- {{url('correspondencia/tipoCorrespondencia')}} --}}
{{-- {{url('correspondencia/subTipoCorrespondencia')}} --}}

