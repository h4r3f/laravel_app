<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $offer->name !!}</p>
</div>

<!-- Details Field -->
<div class="form-group">
    {!! Form::label('details', 'Details:') !!}
    <p>{!! $offer->details !!}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    <p><img src="{{asset('images/offers/'.$offer->image)}}" alt="{{$offer->image}}" width="500" height="350" /></p>
</div>

<!-- Cuponcode Field -->
<div class="form-group">
    {!! Form::label('cuponcode', 'Cuponcode:') !!}
    <p>{!! $offer->cuponcode !!}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', 'Price:') !!}
    <p>{!! $offer->price !!}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
    <p>{!! $offer->type !!}</p>
</div>

<!-- Minimum Field -->
<div class="form-group">
    {!! Form::label('minimum', 'Minimum Purchase:') !!}
    <p>{!! $offer->minimum !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('activate', 'Activate:') !!}
    <p>{!! $offer->activate !!}</p>
</div>

