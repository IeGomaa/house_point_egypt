@csrf
<div class="form-group mb-4">
    <label>Name En</label>
    <input type="text" name="name_en" value="{{ old('name_en', $area->getTranslation('name', 'en') ?? '') }}" class="@error('name_en') is-invalid @enderror form-control">
</div>

@error('name_en')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group mb-4">
    <label>Name Ar</label>
    <input type="text" name="name_ar" value="{{ old('name_ar', $area->getTranslation('name', 'ar') ?? '') }}" class="@error('name_ar') is-invalid @enderror form-control">
</div>

@error('name_ar')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
