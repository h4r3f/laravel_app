@extends('app')
@section('content-header')
    <h1>
      {{ucfirst('customers')}} section
      <small>Manage all your customers from here</small>
    </h1>
@stop
@section('content')

    <div class="container">

        @include('flash::message')
        <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Customers</h3>
              <div class="box-tools">
                <div class="input-group" style="width: 150px;">
                  <a class="btn btn-primary pull-right" href="{!! route('customers.create') !!}">Add New</a>
                  
                </div>
              </div>
            </div>
            <div class="box-body table-responsive no-padding">
                @if($customers->isEmpty())
                    <div class="well text-center">No Customers found.</div>
                @else
                    @include('customers.table')
                @endif
            </div>
        </div>

        @include('common.paginate', ['records' => $customers])

        </div>
        </div>
    </div>
@endsection