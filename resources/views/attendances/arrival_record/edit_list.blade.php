@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Editar Asistencia
                
        </h1>

        <h1>  
           <input type="numer" name="listTable" value="1" class="hidden">
        </h1>

   </section>
   
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                
                  {!! Form::model($attendance, ['url' => ['attendances/list', $attendance->id], 'method' => 'patch']) !!}
                        @include('attendances.arrival_record.fields_list_edit')
                   {!! Form::close() !!}
               </div>

           </div>
       </div>
   </div>
@endsection