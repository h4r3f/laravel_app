@extends('app')
@section('content-header')
    <h1>
      {{ ucfirst('customers') }} edit section
      <small>Edit your customer from here</small>
    </h1>
@stop
@section('content')
<div class="container">

    @include('common.errors')
    <div class="box box-primary" style="width:60%">
        <div class="box-header with-border">
          <h3 class="box-title">Edit a customer</h3>
        </div>
        {!! Form::model($customer, ['route' => ['customers.update', $customer->id], 'method' => 'patch', 'role' => 'form']) !!}
            <div class="box-body">
            @include('customers.fields')

        {!! Form::close() !!}
    </div>
</div>
@endsection
