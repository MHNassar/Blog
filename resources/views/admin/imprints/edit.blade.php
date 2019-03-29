@extends('admin/layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Imprint
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($imprint, ['route' => ['imprints.update', $imprint->id], 'method' => 'patch']) !!}

                        @include('admin/imprints.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection