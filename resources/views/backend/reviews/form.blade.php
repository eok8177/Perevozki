<div class="row">
  <div class="col-md-6">
    <div class="ibox">
      <div class="ibox-body">
        <div class="form-group">
            {{ Form::label('title', 'Name') }}
            {{ Form::text('title', $review->title, ['class' => $errors->has('title') ? 'form-control is-invalid' : 'form-control']) }}
            @if($errors->has('title'))
                <span class="invalid-feedback">
                    {{ $errors->first('title') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            {{ Form::label('text', 'Text') }}
            {{ Form::textarea('text', $review->text, ['class' => $errors->has('text') ? 'form-control is-invalid summernote' : 'form-control summernote', 'rows' => 10]) }}
            @if($errors->has('text'))
                <span class="invalid-feedback">
                    {{ $errors->first('text') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            {{ Form::label('rating', 'Rating') }}
            {{ Form::text('rating', $review->rating, ['class' => $errors->has('rating') ? 'form-control is-invalid' : 'form-control']) }}
            @if($errors->has('rating'))
                <span class="invalid-feedback">
                    {{ $errors->first('rating') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            {{ Form::label('status', 'Status') }}
            {{ Form::select('status', [true => 'Yes', false => 'No'], $review->status, ['class' => $errors->has('status') ? 'form-control is-invalid' : 'form-control']) }}
            @if($errors->has('status'))
                <span class="invalid-feedback">
                    {{ $errors->first('status') }}
                </span>
            @endif
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="ibox">
      <div class="ibox-head">Image</div>
      <div class="ibox-body">
        <img id="holder" style="max-height:100px;" src="{{ $review->image }}">
      </div>
      <div class="ibox-footer pl-4">
        <a id="lfm" data-input="thumbnail" data-preview="holder" class="lfm btn btn-primary">
          <i class="icon icon-picture"></i> Select Image
        </a>
        <a id="delete-image" class="btn btn-danger {{($review->image) ? '' : 'hidden'}}">
          <i class="icon icon-trash"></i> Delete
        </a>
        <input id="thumbnail" class="form-control" type="hidden" name="image" value="{{ $review->image }}">
      </div>
    </div>
  </div>
</div>

<div class="ibox">
  <div class="ibox-footer pl-3">
    <button class="btn btn-success" type="submit"> Save</button>
    <a class="btn btn-warning" href="/admin/reviews"> Cancel</a>
  </div>
</div>
