@csrf
<div class="form-group mb-4">
    <label>Summary</label>
    <input type="text" name="summary" value="{{ old('summary', $summary->summary ?? '') }}" class="@error('summary') is-invalid @enderror form-control">
</div>

@error('summary')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
