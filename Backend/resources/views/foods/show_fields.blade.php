<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $food->name !!}</p>
</div>

<!-- Details Field -->
<div class="form-group">
    {!! Form::label('details', 'Details:') !!}
    <p>{!! $food->details !!}</p>
</div>

<!-- Thumbnail Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Thumbnail Image:') !!}
    <p><img src="{{asset('images/foods/thumb/'.$food->thumbnail)}}" alt="{{$food->thumbnail}}" /></p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    <p><img src="{{asset('images/foods/'.$food->image)}}" alt="{{$food->image}}" width="500" height="350" /></p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', 'Price:') !!}
    <p>{!! $food->price !!}</p>
</div>

<div class="form-group">
    <p> 
        {!! Form::label('package', 'Package:') !!}
        @foreach ($food->packages as $package)
        <span> {{$package->name.'/'}}</span>
        @endforeach
    </p>
</div>

<div class="form-group">
    {!! Form::label('category', 'Category:') !!}
    <p>
        @foreach ($food->categories as $category)
        <span> {{$category->name.'/'}}</span>
        @endforeach
    </p>

</div>
<!-- Slider Field -->
<div class="form-group">
    {!! Form::label('Slider', 'Show in homepage slider:') !!}
    <p>{!! $food->slider !!}</p>
</div>


<!-- Special Field -->
<div class="form-group">
    {!! Form::label('special', 'Special:') !!}
    <p>{!! $food->special !!}</p>
</div>

<!-- Activate Field -->
<div class="form-group">
    {!! Form::label('activate', 'Activate:') !!}
    <p>{!! $food->activate !!}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
    <p>{!! $food->type !!}</p>
</div>

<!-- Cooking Type Field -->
<div class="form-group">
    {!! Form::label('cooking_type', 'Cooking Type:') !!}
    <p>{!! $food->cooking_type !!}</p>
</div>

