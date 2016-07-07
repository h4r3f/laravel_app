@extends('installer')

@section('content')
    <h1>Database</h1>
    <div class="panel-body">
        @if(isset($respond['errors']))
            <div class="alert alert-danger">
                {{ $respond['errors']['message'] }}
            </div>
        @else
            <p>
                Successfully seeded database!!
            </p>
        @endif
        @if(!isset($respond['errors']))
            <a class="btn btn-success" href="{!! url('/login'); !!}">
                Login to Admin Panel
            </a>
        @endif
    </div>
@stop