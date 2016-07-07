@extends('app')
@section('content-header')
    <h1>
      {{ucfirst('foods')}} section
      <small>Manage all your foods from here</small>
    </h1>
@stop
@section('content')

    <div class="container">

        @include('flash::message')
        <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Foods</h3>
              <div class="box-tools">
                <div class="input-group" style="width: 150px;">
                  <a class="btn btn-primary pull-right" href="{!! route('foods.create') !!}">Add New</a>
                  
                </div>
              </div>
            </div>
            <div class="box-body table-responsive no-padding">
                @if($foods->isEmpty())
                    <div class="well text-center">No Foods found.</div>
                @else
                    @include('foods.table')
                @endif
            </div>
        </div>

        @include('common.paginate', ['records' => $foods])

        </div>
        </div>
    </div>
@endsection