@csrf
<div class="form-group mb-4">
    <div class="form-group mb-4">
        <label>Choose User</label>
        <select name="user" class="@error('user') is-invalid @enderror form-control">
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>

    @error('user')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="col-xl-12 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>Permissions</h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">

            @foreach($permissions as $permission)
                <div class="n-chk">
                    <label class="new-control new-checkbox new-checkbox-rounded checkbox-primary">
                        <input type="checkbox" name="permission[]" value="{{ $permission->id }}" class="new-control-input">
                        <span class="new-control-indicator"></span>{{ $permission->name }}
                    </label>
                </div>
            @endforeach

        </div>
    </div>
</div>
