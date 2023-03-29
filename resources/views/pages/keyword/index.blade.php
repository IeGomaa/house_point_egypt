@extends('layouts.master')

@section('title')
    Title & Keyword | Index
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
                                        <h4>Title & Keyword Table</h4>
                                        @can('create keyword')
                                        <a href="{{route('admin.keyword.create')}}">
                                            <button class="btn btn-primary">Create Title & Keyword</button>
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
                                                <th>Description En</th>
                                                <th>Description Ar</th>
                                                <th>Keyword En</th>
                                                <th>Keyword Ar</th>
                                                <th>Tag En</th>
                                                <th>Tag Ar</th>
                                                @can('delete keyword')
                                                <th>Delete</th>
                                                @endcan
                                                @can('edit keyword')
                                                <th>Edit</th>
                                                @endcan
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($keywords as $keyword)
                                                <tr>
                                                    <td>{{ $keyword->id }}</td>
                                                    <td>{{ $keyword->getTranslation('title', 'en') }}</td>
                                                    <td>{{ $keyword->getTranslation('title', 'ar') }}</td>
                                                    <td>{{ $keyword->getTranslation('description', 'en') }}</td>
                                                    <td>{{ $keyword->getTranslation('description', 'ar') }}</td>
                                                    <td>{{ $keyword->getTranslation('keyword', 'en') }}</td>
                                                    <td>{{ $keyword->getTranslation('keyword', 'ar') }}</td>
                                                    <td>{{ $keyword->getTranslation('tag', 'en') }}</td>
                                                    <td>{{ $keyword->getTranslation('tag', 'ar') }}</td>
                                                    @can('delete keyword')
                                                    <td>
                                                        <form action="{{ route('admin.keyword.delete') }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="id" value="{{ $keyword->id }}">
                                                            <input type="submit" value="Delete" class="btn btn-danger">
                                                        </form>
                                                    </td>
                                                    @endcan
                                                    @can('edit keyword')
                                                    <td>
                                                        <form action="{{ route('admin.keyword.edit') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $keyword->id }}">
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
