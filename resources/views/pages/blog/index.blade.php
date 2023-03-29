@extends('layouts.master')

@section('title')
    Blog | Index
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
                                        <h4>Blog Table</h4>
                                        @can('create blog')
                                        <a href="{{route('admin.blog.create')}}">
                                            <button class="btn btn-primary">Create Blog</button>
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
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Image</th>
                                                @can('delete blog')
                                                <th>Delete</th>
                                                @endcan
                                                @can('edit blog')
                                                <th>Edit</th>
                                                @endcan
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($blogs as $blog)
                                                <tr>
                                                    <td>{{ $blog->id }}</td>
                                                    <td>{{ $blog->title }}</td>
                                                    <td>{{ $blog->description }}</td>
                                                    <td>
                                                        <img width="100" src="{{ asset($blog->image) }}" alt="blog_image">
                                                    </td>
                                                    @can('delete blog')
                                                    <td>
                                                        <form action="{{ route('admin.blog.delete') }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="id" value="{{ $blog->id }}">
                                                            <input type="submit" value="Delete" class="btn btn-danger">
                                                        </form>
                                                    </td>
                                                    @endcan
                                                    @can('edit blog')
                                                    <td>
                                                        <form action="{{ route('admin.blog.edit') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $blog->id }}">
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
