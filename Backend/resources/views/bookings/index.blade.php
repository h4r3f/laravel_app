@extends('app')
@section('content-header')
    <h1>
      {{ucfirst('bookings')}} section
      <small>Manage all your bookings from here</small>
    </h1>
@stop
@section('content')

    <div class="container">

        @include('flash::message')
        <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Bookings</h3>
              <div class="box-tools">
                <div class="input-group" style="width: 150px;">
                  <a class="btn btn-primary pull-right" href="{!! route('bookings.create') !!}">Add New</a>
                  
                </div>
              </div>
            </div>
            <div class="box-body table-responsive no-padding">
                @if($bookings->isEmpty())
                    <div class="well text-center">No Bookings found.</div>
                @else
                    @include('bookings.table')
                @endif
            </div>
        </div>

        @include('common.paginate', ['records' => $bookings])

        </div>
        </div>
    </div>
@endsection