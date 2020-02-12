@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Match
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($match, ['route' => ['match.matches.update', $match->uuid], 'method' => 'patch']) !!}

                        @include('match.matches.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
