<!--- Name Field --->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!--- Address Field --->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
	{!! Form::textarea('address', null, ['class' => 'form-control tinymce']) !!}
</div>

<!--- Email Field --->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
	{!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!--- Phone Field --->
<div class="form-group">
    {!! Form::label('phone', 'Phone:') !!}
	{!! Form::number('phone', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
</div>
<div class="box-footer">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
