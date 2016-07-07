<!--- Name Field --->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!--- Image Field --->
<div class="form-group">
   {!! Form::file('image', ['class' => 'file']) !!}
</div>


<!--- Submit Field --->
</div>
<div class="box-footer">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
