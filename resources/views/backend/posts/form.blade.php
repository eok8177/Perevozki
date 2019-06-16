<div class="row">
  <div class="col-md-6">
    <div class="ibox">
      <div class="ibox-body">
        <div class="form-group">
            {{ Form::label('category', 'Category', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-10">
                {{ Form::select('category[]', $post->categories_for_select, $post->categories, ['class' => 'selectpicker', 'multiple' => 'multiple']) }}
                @if($errors->has('published_at'))
                    <span class="invalid-feedback">
                       {{ $errors->first('published_at') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('slug', 'Slug') }}
            {{ Form::text('slug', $post->slug, ['class' => $errors->has('slug') ? 'form-control is-invalid' : 'form-control']) }}
            @if($errors->has('slug'))
                <span class="invalid-feedback">
                    {{ $errors->first('slug') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            {{ Form::label('status', 'Status') }}
            {{ Form::select('status', [true => 'Yes', false => 'No'], $post->status, ['class' => $errors->has('status') ? 'form-control is-invalid' : 'form-control']) }}
            @if($errors->has('status'))
                <span class="invalid-feedback">
                    {{ $errors->first('status') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            {{ Form::label('sort', 'Sort') }}
            {{ Form::text('sort', $post->sort, ['class' => $errors->has('sort') ? 'form-control is-invalid' : 'form-control']) }}
            @if($errors->has('sort'))
                <span class="invalid-feedback">
                    {{ $errors->first('sort') }}
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
        <img id="holder" style="max-height:100px;" src="{{ $post->image }}">
      </div>
      <div class="ibox-footer pl-4">
        <a id="lfm" data-input="thumbnail" data-preview="holder" class="lfm btn btn-primary">
          <i class="icon icon-picture"></i> Select Image
        </a>
        <a id="delete-image" class="btn btn-danger {{($post->image) ? '' : 'hidden'}}">
          <i class="icon icon-trash"></i> Delete
        </a>
        <input id="thumbnail" class="form-control" type="hidden" name="image" value="{{ $post->image }}">
      </div>
    </div>
  </div>
</div>

<div class="ibox">
    <div class="ibox-head">
        <div class="ibox-title">Languages</div>
        <div class="ibox-tools">
            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
        </div>
    </div>
    <div class="ibox-body">
      <ul class="nav nav-tabs tabs-line">
          @foreach ($language as $lang)
          <li class="nav-item">
              <a class="nav-link {{ $loop->first ? 'active' : '' }}" href="#lang_{{ $lang->id }}" data-toggle="tab"><i class="fa fa-globe"></i> {{ $lang->name }}</a>
          </li>
          @endforeach
      </ul>

      <div class="tab-content">

      @foreach ($language as $lang)

        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="lang_{{ $lang->id }}">

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  {{ Form::label('title', 'Title '.$lang->locale) }}
                  {{ Form::text($lang->locale.'[title]', $contents[$lang->locale]->title, ['class' => $errors->has('title') ? 'form-control is-invalid' : 'form-control']) }}
                  @if($errors->has('title'))
                      <span class="invalid-feedback">
                          {{ $errors->first('title') }}
                      </span>
                  @endif
              </div>
              <div class="form-group">
                  {{ Form::label('h1', 'h1 '.$lang->locale) }}
                  {{ Form::text($lang->locale.'[h1]', $contents[$lang->locale]->h1, ['class' => $errors->has('h1') ? 'form-control is-invalid' : 'form-control']) }}
                  @if($errors->has('h1'))
                      <span class="invalid-feedback">
                          {{ $errors->first('h1') }}
                      </span>
                  @endif
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  {{ Form::label('description', 'description '.$lang->locale) }}
                  {{ Form::textarea($lang->locale.'[description]', $contents[$lang->locale]->description, ['class' => $errors->has('description') ? 'form-control is-invalid summernote' : 'form-control summernote', 'rows' => 10]) }}
                  @if($errors->has('description'))
                      <span class="invalid-feedback">
                          {{ $errors->first('description') }}
                      </span>
                  @endif
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  {{ Form::label('meta_title', 'meta_title '.$lang->locale) }}
                  {{ Form::text($lang->locale.'[meta_title]', $contents[$lang->locale]->meta_title, ['class' => $errors->has('meta_title') ? 'form-control is-invalid' : 'form-control']) }}
                  @if($errors->has('meta_title'))
                      <span class="invalid-feedback">
                          {{ $errors->first('meta_title '.$lang->locale) }}
                      </span>
                  @endif
              </div>
              <div class="form-group">
                  {{ Form::label('meta_keywords', 'meta_keywords '.$lang->locale) }}
                  {{ Form::text($lang->locale.'[meta_keywords]', $contents[$lang->locale]->meta_keywords, ['class' => $errors->has('meta_keywords') ? 'form-control is-invalid' : 'form-control']) }}
                  @if($errors->has('meta_keywords'))
                      <span class="invalid-feedback">
                          {{ $errors->first('meta_keywords') }}
                      </span>
                  @endif
              </div>
              <div class="form-group">
                  {{ Form::label('og_title', 'og_title '.$lang->locale) }}
                  {{ Form::text($lang->locale.'[og_title]', $contents[$lang->locale]->og_title, ['class' => $errors->has('og_title') ? 'form-control is-invalid' : 'form-control']) }}
                  @if($errors->has('og_title'))
                      <span class="invalid-feedback">
                          {{ $errors->first('og_title') }}
                      </span>
                  @endif
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  {{ Form::label('meta_description', 'meta_description '.$lang->locale) }}
                  {{ Form::textarea($lang->locale.'[meta_description]', $contents[$lang->locale]->meta_description, ['class' => $errors->has('meta_description') ? 'form-control is-invalid' : 'form-control', 'rows' => '2']) }}
                  @if($errors->has('meta_description'))
                      <span class="invalid-feedback">
                          {{ $errors->first('meta_description') }}
                      </span>
                  @endif
              </div>
              <div class="form-group">
                  {{ Form::label('og_description', 'og_description '.$lang->locale) }}
                  {{ Form::textarea($lang->locale.'[og_description]', $contents[$lang->locale]->og_description, ['class' => $errors->has('og_description') ? 'form-control is-invalid' : 'form-control', 'rows' => '2']) }}
                  @if($errors->has('og_description'))
                      <span class="invalid-feedback">
                          {{ $errors->first('og_description') }}
                      </span>
                  @endif
              </div>
            </div>
          </div>


        </div>
      @endforeach
      </div>

    </div>
    <div class="ibox-footer pl-3">
      <button class="btn btn-success" type="submit"> Save</button>
      <a class="btn btn-warning" href="/admin/posts"> Cancel</a>
    </div>
</div>
