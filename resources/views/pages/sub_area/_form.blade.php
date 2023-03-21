@csrf
<div class="form-group mb-4">
    <label>Name En</label>
    <input type="text" name="name_en" value="{{ old('name_en', $sub_area->getTranslation('name', 'en') ?? '') }}" class="@error('name_en') is-invalid @enderror form-control">

    @error('name_en')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-4">
    <label>Name ar</label>
    <input type="text" name="name_ar" value="{{ old('name_ar', $sub_area->getTranslation('name', 'ar') ?? '') }}" class="@error('name_ar') is-invalid @enderror form-control">

    @error('name_ar')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-4">
    <div class="form-group mb-4">
        <label>Choose Area</label>
        <select name="area_id" class="@error('area') is-invalid @enderror form-control">
            @foreach($areas as $area)
                <option value="{{ $area->id }}">{{ $area->name }}</option>
            @endforeach
        </select>
    </div>

    @error('area')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
