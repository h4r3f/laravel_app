@extends('app')
@section('content-header')
    <h1>
      {{ ucfirst('offers') }} show section
      <small>Showing a particular offer </small>
    </h1>
@stop
@section('content')
<div class="container">
    <div class="box box-primary" style="width:60%">
        <div class="box-header with-border">
          <h3 class="box-title">Showing a offer</h3>
        </div>
        <div class="box-body">
	       @include('offers.show_fields')
        </div>
    </div>
</div>
@endsection
