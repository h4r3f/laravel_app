<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $contact->name !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $contact->email !!}</p>
</div>

<!-- Phone Field -->
<div class="form-group">
    {!! Form::label('phone', 'Phone:') !!}
    <p>{!! $contact->phone !!}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('message', 'Message:') !!}
    <p>{!! $contact->message !!}</p>
</div>

