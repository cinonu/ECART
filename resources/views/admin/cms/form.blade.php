<div class="form-group {{ $errors->has('slug') ? 'has-error' : ''}}">
    <label for="slug" class="control-label">{{ 'Slug' }}</label>
    <input class="form-control" name="slug" type="text" id="slug" value="{{ isset($cm->slug) ? $cm->slug : ''}}" required>
    {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Image' }}</label>
    <input class="form-control" name="image" type="file" id="image" value="{{ isset($cm->image) ? $cm->image : ''}}" required>
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($cm->title) ? $cm->title : ''}}" required>
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div  class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
    <label for="body" class="control-label">{{ 'Body' }}</label>
    <textarea class="form-control summernote" rows="5" name="body"  id="body" required>{{ isset($cm->body) ? $cm->body : ''}}</textarea>
    {!! $errors->first('body', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('other_title') ? 'has-error' : ''}}">
    <label for="other_title" class="control-label">{{ 'Other Title' }}</label>
    <input class="form-control" name="other_title" type="text" id="other_title" value="{{ isset($cm->other_title) ? $cm->other_title : ''}}" required>
    {!! $errors->first('other_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('foooter') ? 'has-error' : ''}}">
    <label for="foooter" class="control-label">{{ 'Foooter' }}</label>
    <input class="form-control" name="foooter" type="text" id="foooter" value="{{ isset($cm->foooter) ? $cm->foooter : ''}}" required>
    {!! $errors->first('foooter', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
