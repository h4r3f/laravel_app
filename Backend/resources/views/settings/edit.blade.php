@extends('app')
@section('content-header')
    <h1>
      {{ ucfirst('settings') }} edit section
      <small>Edit your setting from here</small>
    </h1>
@stop
@section('content')
<div class="container">

    @include('common.errors')
    <div class="box box-primary" style="width:60%">
        <div class="box-header with-border">
          <h3 class="box-title">Edit a setting</h3>
        </div>
        {!! Form::model($setting, ['route' => ['settings.update', $setting->id], 'method' => 'patch', 'role' => 'form', 'files'=>true]) !!}
            <div class="box-body">
            @include('settings.fields')

        {!! Form::close() !!}
    </div>
</div>
@endsection
