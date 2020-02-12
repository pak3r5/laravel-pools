@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            League
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($league, ['route' => ['league.leagues.update', $league->uuid], 'method' => 'patch']) !!}

                        @include('league.leagues.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
