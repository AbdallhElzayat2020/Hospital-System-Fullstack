@extends('Dashboard.layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('Dashboard/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('Dashboard/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('Dashboard/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('Dashboard/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('Dashboard/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('Dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('Dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@section('title')
    {{ __('Dashboard/main-sidebar_trans.AllSections') }}
@endsection
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">{{ __('Dashboard/main-sidebar_trans.sections') }}</h4><span
                class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('Dashboard/main-sidebar_trans.AllSections') }}</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->

@include('Dashboard.messages_alert')


{{-- 
@if (session('add'))
    <div class="alert alert-success">{{ session('add') }}</div>
@endif
@if (session('edit'))
    <div class="alert alert-success">{{ session('edit') }}</div>
@endif
@if (session('delete'))
    <div class="alert alert-success">{{ session('delete') }}</div>
@endif --}}



<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add">
                        {{ trans('Dashboard/sections_trans.add_sections') }}
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example2">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">{{ __('Dashboard/sections_trans.section_title') }}
                                </th>
                                <th class="wd-20p border-bottom-0">{{ __('Dashboard/sections_trans.section_date') }}
                                </th>
                                <th class="wd-25p border-bottom-0">{{ __('Dashboard/sections_trans.Operations') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sections as $key=> $section)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $section->name }}</td>
                                    <td>{{ $section->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                            data-toggle="modal" href="#edit{{ $section->id }}">
                                            <i class="las la-pen"></i>
                                        </a>
                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                            data-toggle="modal" href="#delete{{ $section->id }}">
                                            <i class="las la-trash"></i>
                                        </a>
                                    </td>

                                </tr>
                                @include('Dashboard.Sections.edit')
                                @include('Dashboard.Sections.delete')
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">
                                        {{ __('Dashboard/sections_trans.NoSections') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div><!-- bd -->
        </div><!-- bd -->
        @include('Dashboard.Sections.add')
    </div>
</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{ URL::asset('Dashboard/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('Dashboard/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('Dashboard/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('Dashboard/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('Dashboard/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('Dashboard/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('Dashboard/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('Dashboard/plugins/datatable/js/jszip.min.js') }}"></script>
<script src="{{ URL::asset('Dashboard/plugins/datatable/js/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('Dashboard/plugins/datatable/js/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('Dashboard/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('Dashboard/plugins/datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('Dashboard/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
<script src="{{ URL::asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('Dashboard/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<!--Internal  Datatable js -->
<script src="{{ URL::asset('Dashboard/js/table-data.js') }}"></script>
<!--Internal  Notify js -->
<script src="{{ URL::asset('Dashboard/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('Dashboard/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection
