<!-- Customer Id Field -->
<div class="form-group">
    {!! Form::label('customer_name', 'Customer Name:') !!}
    <p>{!! $cart->customer->name !!}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
    <p>{!! $cart->address !!}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', 'Total:') !!}
    <p>{!! $cart->price !!}</p>
</div>
<div class="form-group">
    {!! Form::label('items', 'Food Items:') !!}
</div>
<div class="row">

    @foreach($cart->cartitems as $cartitem)
    <div class="form-group col-md-3">
        <p>{!! App\Food::find($cartitem->food_id)->name !!}</p>

    </div>
    @endforeach

</div>

<div class="form-group">
    {!! Form::label('items', 'Package Items:') !!}
</div>
<div class="row">

    @foreach($cart->cartpackages as $cartpackage)
    <div class="form-group col-md-3">
        <p>{!! App\Package::find($cartpackage->package_id)->name !!}</p>

    </div>
    @endforeach

</div>

