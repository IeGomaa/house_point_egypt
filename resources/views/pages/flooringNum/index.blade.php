@extends('layouts.master')

@section('title')
    Flooring Num | Index
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
                                        <h4>Flooring Num Table</h4>
                                        <a href="{{route('admin.flooringNum.create')}}">
                                            <button class="btn btn-primary">Create Flooring Num</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover mb-4">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Floor Num</th>
                                                <th>Delete</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($flooringNums as $key => $flooringNum)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $flooringNum->floor_num }}</td>
                                                    <td>
                                                        <form action="{{ route('admin.flooringNum.delete') }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="id" value="{{ $flooringNum->id }}">
                                                            <input type="submit" value="Delete" class="btn btn-danger">
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('admin.flooringNum.edit') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $flooringNum->id }}">
                                                            <input type="submit" value="Edit" class="btn btn-warning">
                                                        </form>
                                                    </td>
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
