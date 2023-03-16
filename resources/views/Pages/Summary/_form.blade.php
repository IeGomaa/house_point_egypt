@csrf
<div class="form-group mb-4">
    <label>Summary</label>
    <input type="text" name="summary" value="{{ old('summary', $summary->summary ?? '') }}" class="form-control">
</div>
