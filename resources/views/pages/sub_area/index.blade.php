@extends('layouts.master')

@section('title')
    Sub Area | Index
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
                                        <h4>Sub Area Table</h4>
                                        @can('create sub area')
                                        <a href="{{route('admin.sub-area.create')}}">
                                            <button class="btn btn-primary">Create Sub Area</button>
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
                                                <th>Area</th>
                                                @can('delete sub area')
                                                <th>Delete</th>
                                                @endcan

                                                @can('edit sub area')
                                                <th>Edit</th>
                                                @endcan
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($subAreas as $subArea)
                                                <tr>
                                                    <td>{{ $subArea->id }}</td>
                                                    <td>{{ $subArea->getTranslation('name', 'en') }}</td>
                                                    <td>{{ $subArea->getTranslation('name', 'ar') }}</td>
                                                    <td>{{ $subArea->area->name }}</td>
                                                    @can('delete sub area')
                                                    <td>
                                                        <form action="{{ route('admin.sub-area.delete') }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="id" value="{{ $subArea->id }}">
                                                            <input type="submit" value="Delete" class="btn btn-danger">
                                                        </form>
                                                    </td>
                                                    @endcan

                                                    @can('edit sub area')
                                                    <td>
                                                        <form action="{{ route('admin.sub-area.edit') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $subArea->id }}">
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
