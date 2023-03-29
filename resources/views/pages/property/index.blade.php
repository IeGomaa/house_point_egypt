@extends('layouts.master')

@section('title')
    Property | Index
@endsection

@push('css')
    <link href="{{ asset('dashboard/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/forms/theme-checkbox-radio.css') }}">
    <link href="{{ asset('dashboard/assets/css/tables/table-basic.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="container" style="max-width: 100% !important;">
            <div class="container">

                <div class="row layout-top-spacing">

                    <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Property Table</h4>
                                        @can('create property')
                                        <a href="{{route('admin.property.create')}}">
                                            <button class="btn btn-primary">Create Property</button>
                                        </a>
                                        @endcan

                                        @can('import property')
                                        <a href="{{route('admin.property.import-page')}}">
                                            <button class="btn btn-success">Upload Property Excel</button>
                                        </a>
                                        @endcan

                                        @can('export property')
                                        <a href="{{route('admin.property.export')}}">
                                            <button class="btn btn-secondary">Download Dummy Data</button>
                                        </a>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover mb-4">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Title En</th>
                                                <th>Title Ar</th>
                                                <th>Property</th>
                                                <th>Type</th>
                                                <th>Area</th>
                                                <th>Sub Area</th>
                                                @can('delete property')
                                                <th>Delete</th>
                                                @endcan
                                                @can('edit property')
                                                <th>Edit</th>
                                                @endcan
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($properties as $property)
                                                <tr>
                                                    <td>{{ $property->id }}</td>
                                                    <td>{{ $property->getTranslation('title', 'en') }}</td>
                                                    <td>{{ $property->getTranslation('title', 'ar') }}</td>
                                                    <td>{{ $property->property }}</td>
                                                    <td>{{ $property->type }}</td>
                                                    <td>{{ $property->area->getTranslation('name', 'en') }}</td>
                                                    <td>{{ $property->sub_area->getTranslation('name', 'en') }}</td>
                                                    @can('delete property')
                                                    <td>
                                                        <form action="{{ route('admin.property.delete') }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="id" value="{{ $property->id }}">
                                                            <input type="submit" value="Delete" class="btn btn-danger">
                                                        </form>
                                                    </td>
                                                    @endcan

                                                    @can('edit property')
                                                    <td>
                                                        <form action="{{ route('admin.property.edit') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $property->id }}">
                                                            <input type="submit" value="Edit" class="btn btn-warning">
                                                        </form>
                                                    </td>
                                                    @endcan
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    {!! $properties->links() !!}

                                </div>

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
    <script src="{{asset('dashboard/plugins/highlight/highlight.pack.js')}}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="{{asset('dashboard/assets/js/scrollspyNav.js')}}"></script>
    <script>
        checkall('todoAll', 'todochkbox');
        $('[data-toggle="tooltip"]').tooltip()
    </script>
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
@endpush
