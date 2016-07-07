<!--- Name Field --->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!--- Details Field --->
<div class="form-group">
    {!! Form::label('details', 'Details:') !!}
	{!! Form::textarea('details', null, ['class' => 'form-control tinymce']) !!}
</div>

<!--- Image Field --->
<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
	{!! Form::file('image') !!}
</div>

<!--- Cuponcode Field --->
<div class="form-group">
    {!! Form::label('cuponcode', 'Cuponcode:') !!}
	{!! Form::text('cuponcode', null, ['class' => 'form-control']) !!}
</div>

<!--- Price Field --->
<div class="form-group">
    {!! Form::label('price', 'Price:') !!}
	{!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!--- Type Field --->
<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
	{!! Form::select('type', [ 'Percentage' => 'Percentage', 'Flat' => 'Flat' ], null, ['class' => 'form-control']) !!}
</div>

<!--- Minimum Field --->
<div class="form-group">
    {!! Form::label('minimum', 'Minimum purchase:') !!}
	{!! Form::number('minimum', null, ['class' => 'form-control']) !!}
</div>

<!--- Status Field --->
<div class="form-group">
    {!! Form::label('status', 'Activate:') !!}
	<div class="radio-inline">
		<label>
			{!! Form::radio('activate', 'Yes', null) !!} Yes
		</label>
	</div>
	<div class="radio-inline">
		<label>
			{!! Form::radio('activate', 'No', null) !!} No
		</label>
	</div>
</div>

<!--- Submit Field --->
</div>
<div class="box-footer">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
