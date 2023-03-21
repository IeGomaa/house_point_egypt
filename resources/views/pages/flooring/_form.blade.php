@csrf
<div class="form-group mb-4">
    <label>Floor En</label>
    <input type="text" name="floor_en" value="{{ old('floor_en', $flooring->getTranslation('floor', 'en') ?? '') }}" class="@error('floor_en') is-invalid @enderror form-control">
</div>

@error('floor_en')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group mb-4">
    <label>Floor Ar</label>
    <input type="text" name="floor_ar" value="{{ old('floor_ar', $flooring->getTranslation('floor', 'ar') ?? '') }}" class="@error('floor_ar') is-invalid @enderror form-control">
</div>

@error('floor_ar')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
