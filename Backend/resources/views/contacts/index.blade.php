@extends('app')
@section('content-header')
    <h1>
      {{ucfirst('contacts')}} section
      <small>Manage all your contacts from here</small>
    </h1>
@stop
@section('content')

    <div class="container">

        @include('flash::message')
        <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Contacts</h3>
              <div class="box-tools">
                <div class="input-group" style="width: 150px;">
                  <a class="btn btn-primary pull-right" href="{!! route('contacts.create') !!}">Add New</a>
                  
                </div>
              </div>
            </div>
            <div class="box-body table-responsive no-padding">
                @if($contacts->isEmpty())
                    <div class="well text-center">No Contacts found.</div>
                @else
                    @include('contacts.table')
                @endif
            </div>
        </div>

        @include('common.paginate', ['records' => $contacts])

        </div>
        </div>
    </div>
@endsection