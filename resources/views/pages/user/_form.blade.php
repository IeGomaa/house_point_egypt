@csrf
<div class="form-group mb-4">
    <label>Name</label>
    <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" class="@error('name') is-invalid @enderror form-control">

    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label>Email</label>
    <input type="text" name="email" value="{{ old('email', $user->email ?? '') }}" class="@error('email') is-invalid @enderror form-control">

    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label>Password</label>
    <input type="text" name="password" value="{{ old('password') }}" class="@error('password') is-invalid @enderror form-control">

    @error('password')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
