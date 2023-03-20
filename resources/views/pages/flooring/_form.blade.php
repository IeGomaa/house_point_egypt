@csrf
<div class="form-group mb-4">
    <label>Floor</label>
    <input type="text" name="floor" value="{{ old('floor', $flooring->floor ?? '') }}" class="@error('floor') is-invalid @enderror form-control">
</div>

@error('floor')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
