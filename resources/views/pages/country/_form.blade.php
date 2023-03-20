@csrf
<div class="form-group mb-4">
    <label>Name</label>
    <input type="text" name="name" value="{{ old('name', $country->name ?? '') }}" class="@error('name') is-invalid @enderror form-control">

    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label>Iso</label>
    <input type="text" name="iso" value="{{ old('iso', $country->iso ?? '') }}" class="@error('iso') is-invalid @enderror form-control">

    @error('iso')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label>Country Code</label>
    <input type="text" name="country_code" value="{{ old('country_code', $country->country_code ?? '') }}" class="@error('country_code') is-invalid @enderror form-control">

    @error('country_code')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label>Phone Code</label>
    <input type="text" name="phone_code" value="{{ old('phone_code', $country->phone_code ?? '') }}" class="@error('phone_code') is-invalid @enderror form-control">

    @error('phone_code')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

</div>
