@extends('layouts.master')

@section('title')
    Floor Number | Create
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
                                        <h4>Floor Number Create</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <form action="{{ route('admin.floor.store') }}" method="post">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label>Number En</label>
                                        <input type="text" name="number_en" value="{{ old('number_en') }}" class="@error('number_en') is-invalid @enderror form-control">
                                    </div>

                                    @error('number_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group mb-4">
                                        <label>Number Ar</label>
                                        <input type="text" name="number_ar" value="{{ old('number_ar') }}" class="@error('number_ar') is-invalid @enderror form-control">
                                    </div>

                                    @error('number_ar')
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
