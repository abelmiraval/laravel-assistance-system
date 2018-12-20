@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1 class="pull-left">Reporte  de Asistencias</h1>
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
                    @include('attendances.list_attendances.table')
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
          
        $(document).ready(function(){
            limpiar();
        });

        function limpiar(){
            $("#id_date_start").val(null);
            $("#id_date_end").val(null);
         }
        </script>
    @endpush
@endsection
