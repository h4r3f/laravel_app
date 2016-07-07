@extends('app')
@section('content-header')
    <h1>
      {{ucfirst('offers')}} section
      <small>Manage all your offers from here</small>
    </h1>
@stop
@section('content')

    <div class="container">

        @include('flash::message')
        <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Offers</h3>
              <div class="box-tools">
                <div class="input-group" style="width: 150px;">
                  <a class="btn btn-primary pull-right" href="{!! route('offers.create') !!}">Add New</a>
                  
                </div>
              </div>
            </div>
            <div class="box-body table-responsive no-padding">
                @if($offers->isEmpty())
                    <div class="well text-center">No Offers found.</div>
                @else
                    @include('offers.table')
                @endif
            </div>
        </div>

        @include('common.paginate', ['records' => $offers])

        </div>
        </div>
    </div>
@endsection