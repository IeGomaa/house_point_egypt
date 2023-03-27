@extends('layouts.master')

@section('title')
    User | Edit
@endsection

@push('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('dashboard/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css"/>
    <!--  END CUSTOM STYLE FILE  -->
@endpush

@section('content')

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="container">

            <div class="container">

                <div class="row layout-top-spacing">

                    <div class="col-lg-12 col-12 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>User Edit</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <form action="{{ route('admin.user.update') }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group mb-4">
                                        <label>Name</label>
                                        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="@error('name') is-invalid @enderror form-control">

                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label>Email</label>
                                        <input type="text" name="email" value="{{ old('email', $user->email) }}" class="@error('email') is-invalid @enderror form-control">

                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label>Password</label>
                                        <input type="text" name="password" value="{{ old('password') }}" class="@error('password') is-invalid @enderror form-control">

                                        @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                    </div>

                                    <input type="submit" value="Update" class="mt-4 mb-4 btn btn-primary">
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!--  END CONTENT AREA  -->
@endsection

@push('js')
    <script src="{{ asset('dashboard/plugins/highlight/highlight.pack.js') }}"></script>
@endpush
