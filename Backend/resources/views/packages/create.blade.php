@extends('app')

@section('content-header')
    <h1>
      {{ ucfirst('packages') }} create section
      <small>Create a new package from here</small>
    </h1>
@stop

@section('content')
<div class="container">

    @include('common.errors')
    <div class="box box-primary" style="width:60%">
        <div class="box-header with-border">
          <h3 class="box-title">Create a package</h3>
        </div>
        {!! Form::open(['route' => 'packages.store', 'role' => 'form', 'files'=>true]) !!}
            <div class="box-body">
                @include('packages.fields')

        {!! Form::close() !!}
    </div>
</div>
@endsection
