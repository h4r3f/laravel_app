@extends('app')
@section('content-header')
    <h1>
      {{ ucfirst('offers') }} edit section
      <small>Edit your offer from here</small>
    </h1>
@stop
@section('content')
<div class="container">

    @include('common.errors')
    <div class="box box-primary" style="width:60%">
        <div class="box-header with-border">
          <h3 class="box-title">Edit a offer</h3>
        </div>
        {!! Form::model($offer, ['route' => ['offers.update', $offer->id], 'method' => 'patch', 'role' => 'form', 'files'=>true]) !!}
            <div class="box-body">
            @include('offers.fields')

        {!! Form::close() !!}
    </div>
</div>
@endsection
