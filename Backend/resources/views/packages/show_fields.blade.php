<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $package->name !!}</p>
</div>
<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    <p><img src="{{asset('images/packages/'.$package->image)}}" alt="{{$package->image}}" width="500" height="350" /></p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', 'Price:') !!}
    <p>{!! $package->price !!}</p>
</div>

