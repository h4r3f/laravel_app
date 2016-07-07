@extends('app')
@section('content-header')
    <h1>
      {{ ucfirst('foods') }} edit section
      <small>Edit your food from here</small>
    </h1>
@stop
@section('content')
<div class="container">

    @include('common.errors')
    <div class="box box-primary" style="width:60%">
        <div class="box-header with-border">
          <h3 class="box-title">Edit a food</h3>
        </div>
        {!! Form::model($food, ['route' => ['foods.update', $food->id], 'method' => 'patch', 'role' => 'form', 'files'=>true]) !!}
            <div class="box-body">
               
            @include('foods.fields')

        {!! Form::close() !!}
    </div>
</div>
@endsection
