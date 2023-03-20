@csrf
<div class="form-group mb-4">
    <label>Name</label>
    <input type="text" name="name" value="{{ old('name', $general->name ?? '') }}" class="@error('name') is-invalid @enderror form-control">
</div>

@error('name')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
