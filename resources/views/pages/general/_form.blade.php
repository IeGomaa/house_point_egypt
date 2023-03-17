@csrf
<div class="form-group mb-4">
    <label>Name</label>
    <input type="text" name="name" value="{{ old('name', $general->name ?? '') }}" class="form-control">
</div>
