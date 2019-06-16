<div class="row">
  <div class="col-md-6">
    <div class="ibox">
      <div class="ibox-body">
        <div class="form-group">
            {{ Form::label('role', 'Role', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-10">
                {{ Form::select('role[]', $user->roles_for_select, $user->roles_for_select, ['class' => 'selectpicker', 'multiple' => 'multiple']) }}
                @if($errors->has('published_at'))
                    <span class="invalid-feedback">
                       {{ $errors->first('published_at') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', $user->name, ['class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control']) }}
            @if($errors->has('name'))
                <span class="invalid-feedback">
                    {{ $errors->first('name') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::text('email', $user->email, ['class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control']) }}
            @if($errors->has('email'))
                <span class="invalid-feedback">
                    {{ $errors->first('email') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            {{ Form::label('status', 'Status') }}
            {{ Form::select('status', [true => 'Yes', false => 'No'], $user->status, ['class' => $errors->has('status') ? 'form-control is-invalid' : 'form-control']) }}
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
        <img id="holder" style="max-height:100px;" src="{{ $user->image }}">
      </div>
      <div class="ibox-footer pl-4">
        <a id="lfm" data-input="thumbnail" data-preview="holder" class="lfm btn btn-primary">
          <i class="icon icon-picture"></i> Select Image
        </a>
        <a id="delete-image" class="btn btn-danger {{($user->image) ? '' : 'hidden'}}">
          <i class="icon icon-trash"></i> Delete
        </a>
        <input id="thumbnail" class="form-control" type="hidden" name="image" value="{{ $user->image }}">
      </div>
    </div>
  </div>
  <div class="ibox-footer pl-3">
    <button class="btn btn-success" type="submit"> Save</button>
    <a class="btn btn-warning" href="/admin/users"> Cancel</a>
  </div>
</div>

