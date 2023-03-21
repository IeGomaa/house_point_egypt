@extends('layouts.master')

@section('title')
    Flooring | Create
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
                                        <h4>Flooring Create</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <form action="{{ route('admin.flooring.store') }}" method="post">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label>Floor En</label>
                                        <input type="text" name="floor_en" value="{{ old('floor_en') }}" class="@error('floor_en') is-invalid @enderror form-control">
                                    </div>

                                    @error('floor_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group mb-4">
                                        <label>Floor Ar</label>
                                        <input type="text" name="floor_ar" value="{{ old('floor_ar') }}" class="@error('floor_ar') is-invalid @enderror form-control">
                                    </div>

                                    @error('floor_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <input type="submit" value="Send" class="mt-4 mb-4 btn btn-primary">
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
