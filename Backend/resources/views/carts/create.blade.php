@extends('app')

@section('content-header')
    <h1>
      {{ ucfirst('carts') }} create section
      <small>Create a new cart from here</small>
    </h1>
@stop

@section('content')
<div class="container">

    @include('common.errors')
    <div class="box box-primary" style="width:60%">
        <div class="box-header with-border">
          <h3 class="box-title">Create a cart</h3>
        </div>
        {!! Form::open(['route' => 'carts.store', 'role' => 'form']) !!}
            <div class="box-body">
                @include('carts.fields')

        {!! Form::close() !!}
    </div>
</div>
@endsection
