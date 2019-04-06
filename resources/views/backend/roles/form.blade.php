    <div class="ibox">
      <div class="ibox-body">
        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', $role->name, ['class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control']) }}
            @if($errors->has('name'))
                <span class="invalid-feedback">
                    {{ $errors->first('name') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            {{ Form::label('permissions', 'Permissions') }}
            {{ Form::text('permissions', $role->permissions, ['class' => $errors->has('permissions') ? 'form-control is-invalid' : 'form-control']) }}
            @if($errors->has('permissions'))
                <span class="invalid-feedback">
                    {{ $errors->first('permissions') }}
                </span>
            @endif
        </div>

      </div>
      <div class="ibox-footer pl-3">
        <button class="btn btn-success" type="submit"> Save</button>
        <a class="btn btn-warning" href="/admin/roles"> Cancel</a>
      </div>
    </div>


