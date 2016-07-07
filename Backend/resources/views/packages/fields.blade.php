<!--- Name Field --->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!--- Image Field --->
<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
	{!! Form::file('image') !!}
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
