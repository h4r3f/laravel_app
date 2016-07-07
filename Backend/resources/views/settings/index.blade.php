@extends('app')
@section('content-header')
    <h1>
      {{ucfirst('settings')}} section
      <small>Manage all your settings from here</small>
    </h1>
@stop
@section('content')

    <div class="container">

        @include('flash::message')
        <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Settings</h3>
              <div class="box-tools">
                <div class="input-group" style="width: 150px;">
                    @if($settings->isEmpty())
                  <a class="btn btn-primary pull-right" href="{!! route('settings.create') !!}">Add New</a>
                  @endif
                </div>
              </div>
            </div>
            <div class="box-body table-responsive no-padding">
                @if($settings->isEmpty())
                    <div class="well text-center">No Settings found.</div>
                @else
                    @include('settings.table')
                @endif
            </div>
        </div>

        @include('common.paginate', ['records' => $settings])

        </div>
        </div>
    </div>
@endsection