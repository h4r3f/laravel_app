@extends('app')
@section('content-header')
    <h1>
      {{ ucfirst('contacts') }} edit section
      <small>Edit your contact from here</small>
    </h1>
@stop
@section('content')
<div class="container">

    @include('common.errors')
    <div class="box box-primary" style="width:60%">
        <div class="box-header with-border">
          <h3 class="box-title">Edit a contact</h3>
        </div>
        {!! Form::model($contact, ['route' => ['contacts.update', $contact->id], 'method' => 'patch', 'role' => 'form']) !!}
            <div class="box-body">
            @include('contacts.fields')

        {!! Form::close() !!}
    </div>
</div>
@endsection
