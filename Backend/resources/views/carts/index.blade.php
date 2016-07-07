@extends('app')
@section('content-header')
    <h1>
      {{ucfirst('carts')}} section
      <small>Manage all your carts from here</small>
    </h1>
@stop
@section('content')

    <div class="container">

        @include('flash::message')
        <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Carts</h3>
              <div class="box-tools">
                <div class="input-group" style="width: 150px;">
                  <a class="btn btn-primary pull-right" href="{!! route('carts.create') !!}">Add New</a>
                  
                </div>
              </div>
            </div>
            <div class="box-body table-responsive no-padding">
                @if($carts->isEmpty())
                    <div class="well text-center">No Carts found.</div>
                @else
                    @include('carts.table')
                @endif
            </div>
        </div>

        @include('common.paginate', ['records' => $carts])

        </div>
        </div>
    </div>
@endsection