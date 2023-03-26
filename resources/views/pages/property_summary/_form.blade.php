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
        <label>Choose Summary</label>
        <select name="summary_id" class="@error('summary') is-invalid @enderror form-control">
            @foreach($summaries as $summary)
                <option value="{{ $summary->id }}">{{ $summary->getTranslation('summary', 'en') }}</option>
            @endforeach
        </select>
    </div>
</div>
@error('summary')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
