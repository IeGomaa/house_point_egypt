@csrf
<div class="form-group mb-4">
    <label>Floor Num</label>
    <input type="text" name="floor_num" value="{{ old('floor_num', $flooringNum->floor_num ?? '') }}" class="@error('floor_num') is-invalid @enderror form-control">
</div>

@error('floor_num')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
