@extends('installer')

@section('content')
    <h1>Installer</h1>
    <p>This will help you get started with the admin panel setup with Laravel 5.1, make sure you have latest version of php and mysql installed.</p>
    <a class="btn btn-primary" href="{{ route('WebInstaller::requirements')}}">Next</a>
@stop