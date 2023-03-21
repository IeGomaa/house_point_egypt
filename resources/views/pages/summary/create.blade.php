@extends('layouts.master')

@section('title')
    Summary | Create
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
                                        <h4>Summary Create</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <form action="{{ route('admin.summary.store') }}" method="post">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label>Summary En</label>
                                        <input type="text" name="summary_en" value="{{ old('summary_en') }}" class="@error('summary_en') is-invalid @enderror form-control">
                                    </div>

                                    @error('summary_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group mb-4">
                                        <label>Summary Ar</label>
                                        <input type="text" name="summary_ar" value="{{ old('summary_ar') }}" class="@error('summary_ar') is-invalid @enderror form-control">
                                    </div>

                                    @error('summary_ar')
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
