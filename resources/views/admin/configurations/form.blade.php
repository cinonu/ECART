<div class="form-group {{ $errors->has('config_key') ? 'has-error' : ''}}">
    <label for="config key" class="control-label">{{ 'Config Key' }}</label>
    <input class="form-control" name="config key" type="text" id="config key" value="{{ isset($configuration->config_key) ? $configuration->config_key : ''}}" required>
    {!! $errors->first('config_key', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('config_value') ? 'has-error' : ''}}">
    <label for="config value" class="control-label">{{ 'Config Value' }}</label>
    <input class="form-control" name="config value" type="text" id="config value" value="{{ isset($configuration->config_value) ? $configuration->config_value : ''}}" required>
    {!! $errors->first('config_value', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
