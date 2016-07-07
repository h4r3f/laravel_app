<!--- Name Field --->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!--- Email Field --->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
	{!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!--- Phone Field --->
<div class="form-group">
    {!! Form::label('phone', 'Phone:') !!}
	{!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!--- Address Field --->
<div class="form-group">
    {!! Form::label('message', 'Message:') !!}
	{!! Form::textarea('message', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
</div>
<div class="box-footer">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
