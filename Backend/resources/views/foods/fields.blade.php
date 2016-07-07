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

<!--- Thumbnail Image Field --->
<div class="form-group">
    {!! Form::label('thumbimage', 'Thumbnail Image:') !!}
    {!! Form::file('thumbnail') !!}
</div>

<!--- Price Field --->
<div class="form-group">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('package', 'Package:') !!}
    {!! Form::select('package[]', $packages,  isset($food->packages) ? array_pluck($food->packages,'id') : ''  , array('multiple'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('category', 'Category:') !!}
    {!! Form::select('category[]', $categories, isset($food->categories) ? array_pluck($food->categories,'id') : ''  ,array('multiple'), ['class' => 'form-control']) !!}
</div>



<!--- Special Field --->
<div class="form-group">
    {!! Form::label('special', 'Special:') !!}
    <div class="radio-inline">
        <label>
            {!! Form::radio('special', 'Yes', null) !!} Yes
        </label>
    </div>
    <div class="radio-inline">
        <label>
            {!! Form::radio('special', 'No', null) !!} No
        </label>
    </div>
</div>


<!--- Slider Field --->
<div class="form-group">
    {!! Form::label('slider', 'Show in homepage slider:') !!}
    <div class="radio-inline">
        <label>
            {!! Form::radio('slider', 'Yes', null) !!} Yes
        </label>
    </div>
    <div class="radio-inline">
        <label>
            {!! Form::radio('slider', 'No', null) !!} No
        </label>
    </div>
</div>

<!--- Activate Field --->
<div class="form-group">
    {!! Form::label('activate', 'Activate:') !!}
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

<!--- Type Field --->
<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::select('type', [ 'Non-Veg' => 'Non-Veg', 'Veg' => 'Veg' ], null, ['class' => 'form-control']) !!}
</div>

<!--- Cooking type Field --->
<div class="form-group">
    {!! Form::label('cooking_type', 'Cooking Type:') !!}
    {!! Form::text('cooking_type', null, ['class' => 'form-control']) !!}
</div>

<!--- Submit Field --->
</div>
<div class="box-footer">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
