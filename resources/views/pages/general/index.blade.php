@extends('layouts.master')

@section('title')
    General | Index
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
                                        <h4>General Table</h4>
                                        @can('create general')
                                        <a href="{{route('admin.general.create')}}">
                                            <button class="btn btn-primary">Create General</button>
                                        </a>
                                        @endcan

                                        @can('import general')
                                        <a href="{{route('admin.general.import-page')}}">
                                            <button class="btn btn-success">Upload General Excel</button>
                                        </a>
                                        @endcan

                                        @can('export general')
                                        <a href="{{route('admin.general.export')}}">
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
                                                <th>Name</th>
                                                @can('delete general')
                                                <th>Delete</th>
                                                @endcan
                                                @can('edit general')
                                                <th>Edit</th>
                                                @endcan
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($generals as $general)
                                                <tr>
                                                    <td>{{ $general->id }}</td>
                                                    <td>{{ $general->name }}</td>
                                                    @can('delete general')
                                                    <td>
                                                        <form action="{{ route('admin.general.delete') }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="id" value="{{ $general->id }}">
                                                            <input type="submit" value="Delete" class="btn btn-danger">
                                                        </form>
                                                    </td>
                                                    @endcan
                                                    @can('edit general')
                                                    <td>
                                                        <form action="{{ route('admin.general.edit') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $general->id }}">
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
