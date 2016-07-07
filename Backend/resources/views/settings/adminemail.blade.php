@extends('app')

@section('content-header')
<h1>
    {{ ucfirst('settings') }} Change Admin Email
    
</h1>
@stop

@section('content')
<div class="container">

    @include('common.errors')
    <div class="box box-primary" style="width:60%">
        <div class="box-header with-border">
            <h3 class="box-title">Change Admin Email</h3>
        </div>
        {!! Form::open(['url' => '/settings/adminemail', 'role' => 'form']) !!}
        <div class="box-body">
            <div class="form-group">
                {!! Form::label('email', 'Admin Email:') !!}
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
            </div>
            <div class="box-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    @endsection
