<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $booking->name !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $booking->email !!}</p>
</div>

<!-- Phone Field -->
<div class="form-group">
    {!! Form::label('phone', 'Phone:') !!}
    <p>{!! $booking->phone !!}</p>
</div>

<!-- Booking Date Field -->
<div class="form-group">
    {!! Form::label('booking_date', 'Booking Date:') !!}
    <p>{!! $booking->booking_date !!}</p>
</div>

<!-- Booking Time Field -->
<div class="form-group">
    {!! Form::label('booking_time', 'Booking Time:') !!}
    <p>{!! $booking->booking_time !!}</p>
</div>

