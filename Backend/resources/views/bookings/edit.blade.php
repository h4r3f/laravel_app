@extends('app')
@section('content-header')
    <h1>
      {{ ucfirst('bookings') }} edit section
      <small>Edit your booking from here</small>
    </h1>
@stop
@section('content')
<div class="container">

    @include('common.errors')
    <div class="box box-primary" style="width:60%">
        <div class="box-header with-border">
          <h3 class="box-title">Edit a booking</h3>
        </div>
        {!! Form::model($booking, ['route' => ['bookings.update', $booking->id], 'method' => 'patch', 'role' => 'form']) !!}
            <div class="box-body">
            @include('bookings.fields')

        {!! Form::close() !!}
    </div>
</div>
@endsection
