<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    {!! Form::label('category_id', 'Category Id', ['class' => 'control-label']) !!}
   {!! Form::select('category_id',$categories, null, ['class' => 'form-control','placeholder'=>'select'] ) !!}   
    {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Product_name') ? 'has-error' : ''}}">
    {!! Form::label('Product_name', 'Product Name', ['class' => 'control-label']) !!}
    {!! Form::text('Product_name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('Product_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Price') ? 'has-error' : ''}}">
    {!! Form::label('Price', 'Price', ['class' => 'control-label']) !!}
    {!! Form::number('Price', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('Price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Product_color') ? 'has-error' : ''}}">
    {!! Form::label('Product_color', 'Product Color', ['class' => 'control-label']) !!}
    {!! Form::text('Product_color', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('Product_color', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Product_Description') ? 'has-error' : ''}}">
    {!! Form::label('Product_Description', 'Product Description', ['class' => 'control-label']) !!}
    {!! Form::textarea('Product_Description', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('Product_Description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Product_code') ? 'has-error' : ''}}">
    {!! Form::label('Product_code', 'Product Code', ['class' => 'control-label']) !!}
    {!! Form::text('Product_code', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('Product_code', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('Product_code') ? 'has-error' : ''}}">
     {!! Form::label('featured', 'Feature this product', ['class' => 'control-label']) !!}
     {!! Form::checkbox('featured') !!}
    {!! $errors->first('Product_code', '<p class="help-block">:message</p>') !!}

</div>

<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
