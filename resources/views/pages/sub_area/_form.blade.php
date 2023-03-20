@csrf
<div class="form-group mb-4">
    <label>Name</label>
    <input type="text" name="name" value="{{ old('name', $sub_area->name ?? '') }}" class="@error('name') is-invalid @enderror form-control">

    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

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
