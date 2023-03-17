@csrf
<div class="form-group mb-4">
    <label>Floor</label>
    <input type="text" name="floor" value="{{ old('floor', $flooring->floor ?? '') }}" class="form-control">
</div>
