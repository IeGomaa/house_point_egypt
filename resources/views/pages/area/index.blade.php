@extends('layouts.master')

@section('title')
    Area | Index
@endsection

@push('css')
    <link href="{{ asset('dashboard/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/forms/theme-checkbox-radio.css') }}">
    <link href="{{ asset('dashboard/assets/css/tables/table-basic.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="container">

                <div class="row layout-top-spacing">

                    <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Area Table</h4>

                                        @can('create area')
                                        <a href="{{route('admin.area.create')}}">
                                            <button class="btn btn-primary">Create Area</button>
                                        </a>
                                        @endcan

                                        @can('import area')
                                        <a href="{{route('admin.area.import-page')}}">
                                            <button class="btn btn-success">Upload Area Excel</button>
                                        </a>
                                        @endcan

                                        @can('export area')
                                        <a href="{{route('admin.area.export')}}">
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
                                                <th>Name En</th>
                                                <th>Name Ar</th>
                                                @can('delete area')
                                                <th>Delete</th>
                                                @endcan
                                                @can('edit area')
                                                <th>Edit</th>
                                                @endcan
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($areas as $area)
                                                <tr>
                                                    <td>{{ $area->id }}</td>
                                                    <td>{{ $area->getTranslation('name', 'en') }}</td>
                                                    <td>{{ $area->getTranslation('name', 'ar') }}</td>
                                                    @can('delete area')
                                                    <td>
                                                        <form action="{{ route('admin.area.delete') }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="id" value="{{ $area->id }}">
                                                            <input type="submit" value="Delete" class="btn btn-danger">
                                                        </form>
                                                    </td>
                                                    @endcan
                                                    @can('edit area')
                                                    <td>
                                                        <form action="{{ route('admin.area.edit') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $area->id }}">
                                                            <input type="submit" value="Edit" class="btn btn-warning">
                                                        </form>
                                                    </td>
                                                    @endcan
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
