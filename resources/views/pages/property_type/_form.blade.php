@csrf
<div class="form-group mb-4">
    <label>Type En</label>
    <input type="text" name="type_en" value="{{ old('type_en', $property_type->getTranslation('type', 'en') ?? '') }}" class="@error('type_en') is-invalid @enderror form-control">
</div>

@error('type_en')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group mb-4">
    <label>Type Ar</label>
    <input type="text" name="type_ar" value="{{ old('type_ar', $property_type->getTranslation('type', 'ar') ?? '') }}" class="@error('type_ar') is-invalid @enderror form-control">
</div>

@error('type_ar')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
