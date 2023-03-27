@extends('layouts.master')

@section('title')
    Property | Create
@endsection

@push('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('dashboard/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/forms/theme-checkbox-radio.css') }}">
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
                                        <h4>Property Create</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <form action="{{ route('admin.property.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label>Title En</label>
                                        <input type="text" name="title_en" value="{{ old('title_en') }}" class="@error('title_en') is-invalid @enderror form-control">
                                    </div>
                                    @error('title_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group mb-4">
                                        <label>Title ar</label>
                                        <input type="text" name="title_ar" value="{{ old('title_ar') }}" class="@error('title_ar') is-invalid @enderror form-control">
                                    </div>
                                    @error('title_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group mb-4">
                                        <label>Tag En</label>
                                        <input type="text" name="tag_en" value="{{ old('tag_en') }}" class="@error('tag_en') is-invalid @enderror form-control">
                                    </div>
                                    @error('tag_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group mb-4">
                                        <label>Tag ar</label>
                                        <input type="text" name="tag_ar" value="{{ old('tag_ar') }}" class="@error('tag_ar') is-invalid @enderror form-control">
                                    </div>
                                    @error('tag_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group mb-4">
                                        <label>Price</label>
                                        <input type="text" name="price" value="{{ old('price') }}" class="@error('price') is-invalid @enderror form-control">
                                    </div>
                                    @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group mb-4">
                                        <label>Surface Area</label>
                                        <input type="text" name="surface_area" value="{{ old('surface_area') }}" class="@error('surface_area') is-invalid @enderror form-control">
                                    </div>
                                    @error('surface_area')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group mb-4">
                                        <label>Number Of Rooms</label>
                                        <input type="text" name="number_of_rooms" value="{{ old('number_of_rooms') }}" class="@error('number_of_rooms') is-invalid @enderror form-control">
                                    </div>
                                    @error('number_of_rooms')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group mb-4">
                                        <label>Number Of Bathrooms</label>
                                        <input type="text" name="number_of_bathrooms" value="{{ old('number_of_bathrooms') }}" class="@error('number_of_bathrooms') is-invalid @enderror form-control">

                                        @error('number_of_bathrooms')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <label class="mt-3">Description</label>
                                    <div class="input-group mb-5">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Description</span>
                                        </div>
                                        <textarea class="@error('description') is-invalid @enderror form-control" name="description" aria-label="With textarea">{{ old('description', $property->description ?? '') }}</textarea>
                                    </div>

                                    @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group mb-4">
                                        <label>Date</label>
                                        <input type="date" name="date" value="{{ old('date') }}" class="@error('date') is-invalid @enderror form-control">
                                    </div>
                                    @error('date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group mb-4">
                                        <label>Owner Name</label>
                                        <input type="text" name="owner_name" value="{{ old('owner_name') }}" class="@error('owner_name') is-invalid @enderror form-control">
                                    </div>
                                    @error('owner_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group mb-4">
                                        <label>Owner Phone</label>
                                        <input type="text" name="owner_phone" value="{{ old('owner_phone') }}" class="@error('owner_phone') is-invalid @enderror form-control">
                                    </div>
                                    @error('owner_phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group mb-4">
                                        <label>Owner Address</label>
                                        <input type="text" name="owner_address" value="{{ old('owner_address') }}" class="@error('owner_address') is-invalid @enderror form-control">
                                    </div>
                                    @error('owner_address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group mb-4">
                                        <label>Rate</label>
                                        <input type="text" name="rate" value="{{ old('rate') }}" class="@error('rate') is-invalid @enderror form-control">
                                    </div>
                                    @error('rate')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group mb-4">
                                        <label>Number Of People Make Rate</label>
                                        <input type="text" name="rate_number" value="{{ old('rate_number') }}" class="@error('rate_number') is-invalid @enderror form-control">
                                    </div>
                                    @error('rate_number')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group mb-4">
                                        <label>Views</label>
                                        <input type="text" name="views" value="{{ old('views') }}" class="@error('views') is-invalid @enderror form-control">
                                    </div>
                                    @error('views')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group mb-4">
                                        <label>Video Url</label>
                                        <input type="text" name="video" value="{{ old('video', 'https://') }}" class="@error('video') is-invalid @enderror form-control">
                                    </div>

                                    @error('video')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group mb-4">
                                        <div class="form-group mb-4">
                                            <label>Choose Property</label>
                                            <select name="property" class="@error('property') is-invalid @enderror form-control">
                                                <option value="rent">Rent</option>
                                                <option value="sale">Sale</option>
                                            </select>
                                        </div>

                                        @error('property')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-4">
                                        <div class="form-group mb-4">
                                            <label>Choose Status</label>
                                            <select name="status" class="@error('status') is-invalid @enderror form-control">
                                                <option value="normal">Normal</option>
                                                <option value="good">Good</option>
                                                <option value="very good">Very Good</option>
                                                <option value="excellent">Excellent</option>
                                            </select>
                                        </div>

                                        @error('status')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="form-group mb-4">
                                        <div class="form-group mb-4">
                                            <label>Choose Type</label>
                                            <select name="type" class="@error('type') is-invalid @enderror form-control">
                                                <option value="commercial">Commercial</option>
                                                <option value="residential">Residential</option>
                                            </select>
                                        </div>

                                        @error('type')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-4">
                                        <div class="form-group mb-4">
                                            <label>Choose Area</label>
                                            <select name="area_id" class="@error('area') is-invalid @enderror form-control">
                                                @foreach($areas as $area)
                                                    <option value="{{ $area->id }}">{{ $area->getTranslation('name', 'en') }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        @error('area')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-4">
                                        <div class="form-group mb-4">
                                            <label>Choose Sub Area</label>
                                            <select name="sub_area_id" class="@error('sub_area') is-invalid @enderror form-control">
                                                @foreach($sub_areas as $sub_area)
                                                    <option value="{{ $sub_area->id }}">{{ $sub_area->getTranslation('name', 'en') }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        @error('sub_area')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-4">
                                        <div class="form-group mb-4">
                                            <label>Choose Property Type</label>
                                            <select name="property_type_id" class="@error('property_type') is-invalid @enderror form-control">
                                                @foreach($property_types as $property_type)
                                                    <option value="{{ $property_type->id }}">{{ $property_type->getTranslation('type', 'en') }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        @error('property_type')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-4">
                                        <div class="form-group mb-4">
                                            <label>Choose Floor</label>
                                            <select name="floor_id" class="@error('floor') is-invalid @enderror form-control">
                                                @foreach($floors as $floor)
                                                    <option value="{{ $floor->id }}">{{ $floor->getTranslation('number', 'en') }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        @error('floor')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-4">
                                        <div class="form-group mb-4">
                                            <label>Choose Furniture</label>
                                            <select name="furniture_id" class="@error('furniture') is-invalid @enderror form-control">
                                                @foreach($furniture as $val)
                                                    <option value="{{ $val->id }}">{{ $val->getTranslation('furniture', 'en') }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        @error('furniture')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-xl-12 col-12 layout-spacing">
                                        <div class="statbox widget box box-shadow">
                                            <div class="widget-header">
                                                <div class="row">
                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                        <h4>Summary</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content widget-content-area">

                                                @foreach($summaries as $summary)
                                                    <div class="n-chk">
                                                        <label class="new-control new-checkbox new-checkbox-rounded checkbox-primary">
                                                            <input type="checkbox" name="summary[]" value="{{ $summary->id }}" class="new-control-input">
                                                            <span class="new-control-indicator"></span>{{ $summary->getTranslation('summary', 'en') }}
                                                        </label>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-12 layout-spacing">
                                        <div class="statbox widget box box-shadow">
                                            <div class="widget-header">
                                                <div class="row">
                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                        <h4>General</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content widget-content-area">

                                                @foreach($generals as $general)
                                                    <div class="n-chk">
                                                        <label class="new-control new-checkbox new-checkbox-rounded checkbox-primary">
                                                            <input type="checkbox" name="general[]" value="{{ $general->id }}" class="new-control-input">
                                                            <span class="new-control-indicator"></span>{{ $general->name }}
                                                        </label>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-12 layout-spacing">
                                        <div class="statbox widget box box-shadow">
                                            <div class="widget-header">
                                                <div class="row">
                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                        <h4>Flooring</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content widget-content-area">

                                                @foreach($flooring as $val)
                                                    <div class="n-chk">
                                                        <label class="new-control new-checkbox new-checkbox-rounded checkbox-primary">
                                                            <input type="checkbox" name="flooring[]" value="{{ $val->id }}" class="new-control-input">
                                                            <span class="new-control-indicator"></span>{{ $val->getTranslation('floor', 'en') }}
                                                        </label>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row layout-top-spacing">

                                        <div id="fuSingleFile" class="col-lg-12 layout-spacing">
                                            <div class="statbox widget box box-shadow">
                                                <div class="widget-header">
                                                    <div class="row">
                                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                            <h4>Property Images</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content widget-content-area">
                                                    <div class="custom-file-container" data-upload-id="myFirstImage">
                                                        <label>Upload (Multiple Image) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                                        <label class="custom-file-container__custom-file" >
                                                            <input type="file" name="image[]" class="@error('image') is-invalid @enderror custom-file-container__custom-file__custom-file-input" multiple accept="image/*">
                                                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                        </label>
                                                        <div class="custom-file-container__image-preview"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @error('image')
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
    <script src="{{ asset('dashboard/plugins/highlight/highlight.pack.js') }}"></script>
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('dashboard/plugins/blockui/jquery.blockUI.min.js') }}"></script>

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
