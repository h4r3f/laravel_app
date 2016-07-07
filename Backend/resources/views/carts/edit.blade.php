@extends('app')
@section('content-header')
    <h1>
      {{ ucfirst('carts') }} edit section
      <small>Edit your cart from here</small>
    </h1>
@stop
@section('content')
<div class="container">

    @include('common.errors')
    <div class="box box-primary" style="width:60%">
        <div class="box-header with-border">
          <h3 class="box-title">Edit a cart</h3>
        </div>
        {!! Form::model($cart, ['route' => ['carts.update', $cart->id], 'method' => 'patch', 'role' => 'form']) !!}
            <div class="box-body">
            @include('carts.fields')

        {!! Form::close() !!}
    </div>
</div>
@endsection
