@csrf
<div class="form-group mb-4">
    <label>Summary En</label>
    <input type="text" name="summary_en" value="{{ old('summary_en', $summary->getTranslation('summary', 'en') ?? '') }}" class="@error('summary_en') is-invalid @enderror form-control">
</div>

@error('summary_en')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group mb-4">
    <label>Summary Ar</label>
    <input type="text" name="summary_ar" value="{{ old('summary_ar', $summary->getTranslation('summary', 'ar') ?? '') }}" class="@error('summary_ar') is-invalid @enderror form-control">
</div>

@error('summary_ar')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
