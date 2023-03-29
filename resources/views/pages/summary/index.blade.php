@extends('layouts.master')

@section('title')
    Summary | Index
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
                                        <h4>Summary Table</h4>
                                        @can('create summary')
                                        <a href="{{route('admin.summary.create')}}">
                                            <button class="btn btn-primary">Create Summary</button>
                                        </a>
                                        @endcan

                                        @can('import summary')
                                        <a href="{{route('admin.summary.import-page')}}">
                                            <button class="btn btn-success">Upload Summary Excel</button>
                                        </a>
                                        @endcan

                                        @can('export summary')
                                        <a href="{{route('admin.summary.export')}}">
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
                                                <th>Summary En</th>
                                                <th>Summary Ar</th>
                                                @can('delete summary')
                                                <th>Delete</th>
                                                @endcan
                                                @can('edit summary')
                                                <th>Edit</th>
                                                @endcan
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($summaries as $summary)
                                                <tr>
                                                    <td>{{ $summary->id }}</td>
                                                    <td>{{ $summary->getTranslation('summary', 'en') }}</td>
                                                    <td>{{ $summary->getTranslation('summary', 'ar') }}</td>
                                                    @can('delete summary')
                                                    <td>
                                                        <form action="{{ route('admin.summary.delete') }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="id" value="{{ $summary->id }}">
                                                            <input type="submit" value="Delete" class="btn btn-danger">
                                                        </form>
                                                    </td>
                                                    @endcan

                                                    @can('edit summary')
                                                    <td>
                                                        <form action="{{ route('admin.summary.edit') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $summary->id }}">
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
