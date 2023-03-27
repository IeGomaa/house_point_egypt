@csrf
<div class="form-group mb-4">
    <label>Link</label>
    <input type="text" name="link" value="{{ old('link', $link->link ?? 'https://') }}" class="@error('link') is-invalid @enderror form-control">
</div>

@error('link')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group mb-4">
    <div class="form-group mb-4">
        <label>Choose Position</label>
        <select name="position" class="@error('position') is-invalid @enderror form-control">
            <option value="header">Header</option>
            <option value="footer">Footer</option>
        </select>
    </div>

    @error('position')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
