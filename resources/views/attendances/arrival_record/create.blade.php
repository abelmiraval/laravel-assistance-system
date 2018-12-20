@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
          Registro de llegada
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                   
                      {!!Form::open(array('url'=>'attendances/arrival_record','method'=>'POST','autocomplete'=>'off')) !!}

                        @include('attendances.arrival_record.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
