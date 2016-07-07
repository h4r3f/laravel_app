@extends('app')
@section('content-header')
    <h1>
      {{ ucfirst('contacts') }} show section
      <small>Showing a particular contact </small>
    </h1>
@stop
@section('content')
<div class="container">
    <div class="box box-primary" style="width:60%">
        <div class="box-header with-border">
          <h3 class="box-title">Showing a contact</h3>
        </div>
        <div class="box-body">
	       @include('contacts.show_fields')
        </div>
    </div>
</div>
@endsection
