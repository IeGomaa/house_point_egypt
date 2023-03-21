@extends('layouts.master')

@section('title')
    Sub Area | Create
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
                                        <h4>Sub Area Create</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <form action="{{ route('admin.sub-area.store') }}" method="post">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label>Name En</label>
                                        <input type="text" name="name_en" value="{{ old('name_en') }}" class="@error('name_en') is-invalid @enderror form-control">

                                        @error('name_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-4">
                                        <label>Name ar</label>
                                        <input type="text" name="name_ar" value="{{ old('name_ar') }}" class="@error('name_ar') is-invalid @enderror form-control">

                                        @error('name_ar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-4">
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
