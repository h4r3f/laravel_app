<!--- Customer Id Field --->
<div class="form-group">
    {!! Form::label('customer_id', 'Customer Id:') !!}
	{!! Form::number('customer_id', null, ['class' => 'form-control']) !!}
</div>

<!--- Address Field --->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
	{!! Form::textarea('address', null, ['class' => 'form-control tinymce']) !!}
</div>

<!--- Price Field --->
<div class="form-group">
    {!! Form::label('price', 'Price:') !!}
	{!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
</div>
<div class="box-footer">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
