@extends('installer')

@section('content')
    <h1>Requirements</h1>
    <p>If everything is green, you are good to go. Otherwise, kindly check the items in red, make the corrections and comeback here after that.</p>
    <hr>

    <h2>Extensions</h2>
    <ul class="list-group">
        @foreach($extensions['requirements'] as $element => $enabled)
        <li class="list-group-item">
            @if($enabled)
                <span class="badge badge-success">
                    <i class="glyphicon glyphicon-ok"></i>
                </span>
            @else
                <span class="badge badge-danger">
                    <i class="glyphicon glyphicon-remove"></i>
                </span>
            @endif
            {{ $element }}
        </li>
        @endforeach
    </ul>
    <hr>
    
    <h2>Permissions</h2>
    <ul class="list-group">
        @foreach($permissions['permissions'] as $permission)
            <li class="list-group-item">
                @if($permission['isSet'])
                    <span class="badge badge-success">
                        {{ $permission['permission'] }}
                    </span>
                @else
                    <span class="badge badge-danger">
                        {{ $permission['permission'] }}
                    </span>
                @endif
                {{ $permission['folder'] }}
            </li>
        @endforeach
    </ul>
    
    <div>
        @if($ready)
            <div class="alert alert-danger">
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                Clicking next, will try to migrate and setup your database, please insure you have the correct database credentials in your env file.
            </div>
            <a href="{{ route('WebInstaller::database')}}" class="btn btn-lg btn-primary">Next</a>
        @endif
    </div>

@stop