@extends('app')
@section('content-header')
    <h1>
      {{ ucfirst('packages') }} show section
      <small>Showing a particular package </small>
    </h1>
@stop
@section('content')
<div class="container">
    <div class="box box-primary" style="width:60%">
        <div class="box-header with-border">
          <h3 class="box-title">Showing a package</h3>
        </div>
        <div class="box-body">
	       @include('packages.show_fields')
        </div>
    </div>
</div>
@endsection
