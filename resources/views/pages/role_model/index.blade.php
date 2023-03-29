@extends('layouts.master')

@section('title')
    Permission & Model | Index
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
                                        <h4>Role & Model Table</h4>
                                        @can('create role model')
                                        <a href="{{route('admin.role-model.create')}}">
                                            <button class="btn btn-primary">Assign Permission To User</button>
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
                                                <th>User</th>
                                                <th>Permission</th>
                                                @can('delete role model')
                                                <th>Delete</th>
                                                @endcan
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                                @foreach($user->permissions as $permission)
                                                    <tr>
                                                        <td>{{ $permission->id }}</td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $permission->name }}</td>
                                                        @can('delete role model')
                                                        <td>
                                                            <form action="{{ route('admin.role-model.delete') }}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                                <input type="hidden" name="permission_id" value="{{ $permission->id }}">
                                                                <input type="submit" value="Delete" class="btn btn-danger">
                                                            </form>
                                                        </td>
                                                        @endcan
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>

                                    {!! $users->links() !!}

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
