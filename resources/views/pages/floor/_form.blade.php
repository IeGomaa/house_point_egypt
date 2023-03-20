@csrf
<div class="form-group mb-4">
    <label>Number</label>
    <input type="text" name="number" value="{{ old('number', $floor->number ?? '') }}" class="@error('number') is-invalid @enderror form-control">
</div>

@error('number')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
