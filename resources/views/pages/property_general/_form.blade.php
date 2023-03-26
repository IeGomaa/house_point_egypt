@csrf
<div class="form-group mb-4">
    <div class="form-group mb-4">
        <label>Choose Property</label>
        <select name="property_id" class="@error('property') is-invalid @enderror form-control">
            @foreach($properties as $property)
                <option value="{{ $property->id }}">{{ $property->getTranslation('title', 'en') }}</option>
            @endforeach
        </select>
    </div>
</div>
@error('property')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group mb-4">
    <div class="form-group mb-4">
        <label>Choose General</label>
        <select name="general_id" class="@error('general') is-invalid @enderror form-control">
            @foreach($generals as $general)
                <option value="{{ $general->id }}">{{ $general->name }}</option>
            @endforeach
        </select>
    </div>
</div>
@error('general')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
