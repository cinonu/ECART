<div class="form-group {{ $errors->has('coupon_code') ? 'has-error' : ''}}">
    {!! Form::label('coupon_code', 'coupon_code', ['class' => 'control-label']) !!}
    {!! Form::text('coupon_code', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('coupon_code', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('amount') ? 'has-error' : ''}}">
    {!! Form::label('amount', 'amount', ['class' => 'control-label']) !!}
    {!! Form::text('amount', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('amount_type') ? 'has-error' : ''}}">
    <label for="amount_type" class="control-label">{{ 'amount_type' }}</label>
    <select name="amount_type" class="form-control" id="amount_type" >
    @foreach (json_decode('{"percentage":"Percentage","fixed":"Fixed"}', true) as $optionKey => $optionValue)
        <option placeholder="select" value="{{ $optionKey }}" {{ (isset($coupon->amount_type) && $user->amount_type == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('role', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'status', ['class' => 'control-label']) !!}
    {!! Form::text('status', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
