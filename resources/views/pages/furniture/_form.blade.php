@csrf
<div class="form-group mb-4">
    <label>Furniture</label>
    <input type="text" name="furniture" value="{{ old('furniture', $furniture->furniture ?? '') }}" class="@error('furniture') is-invalid @enderror form-control">
</div>

@error('furniture')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
