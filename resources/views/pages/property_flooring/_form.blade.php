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
        <label>Choose Flooring</label>
        <select name="flooring_id" class="@error('flooring') is-invalid @enderror form-control">
            @foreach($flooring as $val)
                <option value="{{ $val->id }}">{{ $val->getTranslation('floor', 'en') }}</option>
            @endforeach
        </select>
    </div>
</div>
@error('flooring')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
