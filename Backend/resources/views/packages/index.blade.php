@extends('app')
@section('content-header')
    <h1>
      {{ucfirst('packages')}} section
      <small>Manage all your packages from here</small>
    </h1>
@stop
@section('content')

    <div class="container">

        @include('flash::message')
        <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Packages</h3>
              <div class="box-tools">
                <div class="input-group" style="width: 150px;">
                  <a class="btn btn-primary pull-right" href="{!! route('packages.create') !!}">Add New</a>
                  
                </div>
              </div>
            </div>
            <div class="box-body table-responsive no-padding">
                @if($packages->isEmpty())
                    <div class="well text-center">No Packages found.</div>
                @else
                    @include('packages.table')
                @endif
            </div>
        </div>

        @include('common.paginate', ['records' => $packages])

        </div>
        </div>
    </div>
@endsection