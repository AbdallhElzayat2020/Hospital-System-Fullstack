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
    {{ __('Dashboard/doctors.doctors') }}
@endsection
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">{{ __('Dashboard/doctors.doctors') }}</h4><span
                class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('Dashboard/doctors.AllDoctors') }}</span>
        </div>
    </div>

</div>
<!-- breadcrumb -->
@endsection
@section('content')
@include('Dashboard.messages_alert')


<!-- row -->
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add">
                        {{ trans('Dashboard/doctors.add_doctor') }}
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example2">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">{{ __('Dashboard/doctors.doctor_name') }}
                                </th>
                                <th class="wd-20p border-bottom-0">{{ __('Dashboard/doctors.doctor_email') }}
                                </th>
                                <th class="wd-20p border-bottom-0">{{ __('Dashboard/doctors.phone') }}
                                </th>
                                <th class="wd-20p border-bottom-0">{{ __('Dashboard/doctors.price') }}
                                </th>
                                <th class="wd-20p border-bottom-0">{{ __('Dashboard/doctors.status') }}
                                </th>
                                <th class="wd-20p border-bottom-0">{{ __('Dashboard/doctors.appointments') }}
                                </th>
                                <th class="wd-20p border-bottom-0">{{ __('Dashboard/doctors.doctor_section') }}
                                </th>
                                <th class="wd-20p border-bottom-0">{{ __('Dashboard/doctors.date') }}
                                </th>
                                <th class="wd-25p border-bottom-0">{{ __('Dashboard/doctors.Operations') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($doctors as $key=> $doctor)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $doctor->name }}</td>
                                    <td>{{ $doctor->email }}</td>
                                    <td>{{ $doctor->phone }}</td>
                                    <td>{{ $doctor->price }}</td>
                                    <td>
                                        <div
                                            class="dot-label bg-{{ $doctor->status == 1 ? 'success' : 'danger' }} ml-1">
                                        </div>
                                        {{ $doctor->status == 1 ? trans('Dashboard/doctors.Active') : trans('Dashboard/doctors.NotActive') }}
                                    </td>
                                    <td>{{ $doctor->appointments }}</td>
                                    <td>{{ $doctor->section->name }}</td>
                                    <td>{{ $doctor->created_at->diffForHumans() }}</td>
                                    <td class="d-flex ">
                                        <a class="modal-effect mx-1 btn btn-sm btn-info" data-effect="effect-scale"
                                            data-toggle="modal" href="#edit{{ $doctor->id }}">
                                            <i class="las la-pen"></i>
                                        </a>
                                        <a class="modal-effect mx-1 btn btn-sm btn-danger" data-effect="effect-scale"
                                            data-toggle="modal" href="#delete{{ $doctor->id }}">
                                            <i class="las la-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @include('Dashboard.Doctors.edit')
                                @include('Dashboard.Doctors.delete')
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">
                                        {{ __('Dashboard/sections_trans.NoData') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div><!-- bd -->
        </div><!-- bd -->
        @include('Dashboard.Doctors.add')
    </div>
</div>


{{-- <div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add">
                        {{ trans('Dashboard/doctors.add_doctor') }}
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example2">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">{{ __('Dashboard/doctors.doctor_name') }}
                                </th>
                                <th class="wd-20p border-bottom-0">{{ __('Dashboard/sections_trans.section_date') }}
                                </th>
                                <th class="wd-25p border-bottom-0">{{ __('Dashboard/sections_trans.Operations') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($doctors as $key=> $doctor)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $doctor->name }}</td>
                                    <td>{{ $doctor->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                            data-toggle="modal" href="#edit{{ $doctor->id }}">
                                            <i class="las la-pen"></i>
                                        </a>
                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                            data-toggle="modal" href="#delete{{ $doctor->id }}">
                                            <i class="las la-trash"></i>
                                        </a>
                                    </td>

                                </tr>
                                @include('Dashboard.Doctors.edit')
                                @include('Dashboard.Doctors.delete')
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
</div> --}}


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
