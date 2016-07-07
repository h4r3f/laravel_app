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


<!--- Phone Field --->
<div class="form-group">
    {!! Form::label('persons', 'Persons:') !!}
	{!! Form::number('persons', null, ['class' => 'form-control']) !!}
</div>

<!--- Type Field --->
<div class="form-group">
    {!! Form::label('confirm', 'Confirmed:') !!}
	{!! Form::select('confirmed', [ 'Yes' => 'Yes', 'No' => 'No' ], null, ['class' => 'form-control']) !!}
</div>
<!--- Booking Date Field --->
<div class="form-group">
    {!! Form::label('booking_date', 'Booking Date:') !!}
	{!! Form::date('booking_date', null, ['class' => 'form-control']) !!}
</div>

<!--- Booking Time Field --->
<div class="form-group">
    {!! Form::label('booking_time', 'Booking Time:') !!}
	{!! Form::text('booking_time', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
</div>
<div class="box-footer">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
