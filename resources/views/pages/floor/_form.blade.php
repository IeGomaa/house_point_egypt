@csrf
<div class="form-group mb-4">
    <label>Number En</label>
    <input type="text" name="number_en" value="{{ old('number_en', $floor->getTranslation('number', 'en') ?? '') }}" class="@error('number_en') is-invalid @enderror form-control">
</div>

@error('number_en')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group mb-4">
    <label>Number Ar</label>
    <input type="text" name="number_ar" value="{{ old('number_ar', $floor->getTranslation('number', 'ar') ?? '') }}" class="@error('number_ar') is-invalid @enderror form-control">
</div>

@error('number_ar')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
