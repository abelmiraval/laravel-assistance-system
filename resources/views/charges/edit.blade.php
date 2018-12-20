@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cargo
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($charge, ['route' => ['charges.update', $charge->id], 'method' => 'patch']) !!}
                        @include('charges.fields')
                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection