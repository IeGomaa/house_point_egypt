@extends('layouts.master')

@section('title')
    Title & Keyword | Create
@endsection

@push('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('dashboard/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('dashboard/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css" />
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
                                        <h4>Title & Keyword Create</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <form action="{{ route('admin.keyword.store') }}" method="post">
                                    @csrf
                                    <div class="form-group mb-4">

                                        <label class="mt-3">Title En</label>
                                        <div class="input-group mb-5">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Title</span>
                                            </div>
                                            <textarea class="@error('title_en') is-invalid @enderror form-control" name="title_en" aria-label="With textarea">{{ old('title_en') }}</textarea>
                                        </div>

                                        @error('title_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label class="mt-3">Description En</label>
                                        <div class="input-group mb-5">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Description</span>
                                            </div>
                                            <textarea class="@error('description_en') is-invalid @enderror form-control" name="description_en" aria-label="With textarea">{{ old('description_en') }}</textarea>
                                        </div>

                                        @error('description_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label class="mt-3">Keyword En</label>
                                        <div class="input-group mb-5">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Keyword</span>
                                            </div>
                                            <textarea class="@error('keyword_en') is-invalid @enderror form-control" name="keyword_en" aria-label="With textarea">{{ old('keyword_en') }}</textarea>
                                        </div>

                                        @error('keyword_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label class="mt-3">Tag En</label>
                                        <div class="input-group mb-5">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Tag</span>
                                            </div>
                                            <textarea class="@error('tag_en') is-invalid @enderror form-control" name="tag_en" aria-label="With textarea">{{ old('tag_en') }}</textarea>
                                        </div>

                                        @error('tag_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label class="mt-3">Title Ar</label>
                                        <div class="input-group mb-5">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Title</span>
                                            </div>
                                            <textarea class="@error('title_ar') is-invalid @enderror form-control" name="title_ar" aria-label="With textarea">{{ old('title_ar') }}</textarea>
                                        </div>

                                        @error('title_ar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label class="mt-3">Description Ar</label>
                                        <div class="input-group mb-5">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Description</span>
                                            </div>
                                            <textarea class="@error('description_ar') is-invalid @enderror form-control" name="description_ar" aria-label="With textarea">{{ old('description_ar') }}</textarea>
                                        </div>

                                        @error('description_ar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label class="mt-3">Keyword Ar</label>
                                        <div class="input-group mb-5">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Keyword</span>
                                            </div>
                                            <textarea class="@error('keyword_ar') is-invalid @enderror form-control" name="keyword_ar" aria-label="With textarea">{{ old('keyword_ar')  }}</textarea>
                                        </div>

                                        @error('keyword_ar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label class="mt-3">Tag Ar</label>
                                        <div class="input-group mb-5">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Tag</span>
                                            </div>
                                            <textarea class="@error('tag_ar') is-invalid @enderror form-control" name="tag_ar" aria-label="With textarea">{{ old('tag_ar') }}</textarea>
                                        </div>

                                        @error('tag_ar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
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

    <script src="{{ asset('dashboard/plugins/blockui/jquery.blockUI.min.js') }}"></script>

    <script src="{{ asset('dashboard/plugins/highlight/highlight.pack.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('dashboard/assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>

    <script>
        //First upload
        var firstUpload = new FileUploadWithPreview('myFirstImage')
        //Second upload
        var secondUpload = new FileUploadWithPreview('mySecondImage')
    </script>
    <!-- END PAGE LEVEL PLUGINS -->
@endpush
