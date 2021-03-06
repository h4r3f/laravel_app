@extends('app')
@section('content-header')
    <h1>
      {{ucfirst('categories')}} section
      <small>Manage all your categories from here</small>
    </h1>
@stop
@section('content')

    <div class="container">

        @include('flash::message')
        <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Categories</h3>
              <div class="box-tools">
                <div class="input-group" style="width: 150px;">
                  <a class="btn btn-primary pull-right" href="{!! route('categories.create') !!}">Add New</a>
                  
                </div>
              </div>
            </div>
            <div class="box-body table-responsive no-padding">
                @if($categories->isEmpty())
                    <div class="well text-center">No Categories found.</div>
                @else
                    @include('categories.table')
                @endif
            </div>
        </div>

        @include('common.paginate', ['records' => $categories])

        </div>
        </div>
    </div>
@endsection