@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1 class="pull-left">Lista  de Asistencias</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="form-group">
            @include('attendances.list_attendances.search')
        </div>
        
        <div class="box box-primary">
            <div class="box-body">
                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12" >
                    <div class="form-group" >
                        <label >Empleado</label>
                        <input type="text" name="date_start" value="{{ $datos['employee'] }}" class="form-control" readonly="readonly"> 
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12" >
                    <div class="form-group" >
                        <label >Fecha Inicio</label>
                            <input type="text" name="date_start" value="{{ $datos['date_start'] }}" class="form-control" readonly="readonly">
                    </div>
                </div>

                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12" >
                    <div class="form-group" >
                        <label >Fecha Fin</label>
                            <input type="text" name="date_start" value="{{ $datos['date_end'] }}" class="form-control" readonly="readonly">
                    </div>
                </div>

                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12" >
                    <div class="form-group" >
                        <label >Horas No Laboradas</label>
                            <input type="text" name="date_start" value="{{ $datos['totalHours'] }}" class="form-control" readonly="readonly">        
                    </div>
                </div>             
            </div>
        </div>
      
    </div>

    @push('scripts')
        <script>


        $(document).ready(function(){
          $('#btn_search').click(function(){ 
           // limpiar();
          })
        });

        function limpiar(){
            $("#id_date_start").val(null);
            $("#id_date_end").val(null);
         }
        </script>
    @endpush
@endsection
