@csrf
<div class="form-group mb-4">
    <label>Furniture En</label>
    <input type="text" name="furniture_en" value="{{ old('furniture_en', $furniture->getTranslation('furniture', 'en') ?? '') }}" class="@error('furniture_en') is-invalid @enderror form-control">
</div>

@error('furniture_en')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group mb-4">
    <label>Furniture Ar</label>
    <input type="text" name="furniture_ar" value="{{ old('furniture_ar', $furniture->getTranslation('furniture', 'ar') ?? '') }}" class="@error('furniture_ar') is-invalid @enderror form-control">
</div>

@error('furniture_ar')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
