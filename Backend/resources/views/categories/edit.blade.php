@extends('app')
@section('content-header')
    <h1>
      {{ ucfirst('categories') }} edit section
      <small>Edit your category from here</small>
    </h1>
@stop
@section('content')
<div class="container">

    @include('common.errors')
    <div class="box box-primary" style="width:60%">
        <div class="box-header with-border">
          <h3 class="box-title">Edit a category</h3>
        </div>
        {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'patch','files'=>true, 'role' => 'form']) !!}
            <div class="box-body">
            @include('categories.fields')

        {!! Form::close() !!}
    </div>
</div>
@endsection
