@extends('app')

@section('content-header')
    <h1>
      {{ ucfirst('contacts') }} create section
      <small>Create a new contact from here</small>
    </h1>
@stop

@section('content')
<div class="container">

    @include('common.errors')
    <div class="box box-primary" style="width:60%">
        <div class="box-header with-border">
          <h3 class="box-title">Create a contact</h3>
        </div>
        {!! Form::open(['route' => 'contacts.store', 'role' => 'form']) !!}
            <div class="box-body">
                @include('contacts.fields')

        {!! Form::close() !!}
    </div>
</div>
@endsection
