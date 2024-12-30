@extends('Dashboard.layouts.master')
@section('css')
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('Dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@section('title')
    {{ __('Dashboard/doctors.add_doctor') }}
@endsection
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">{{ __('Dashboard/doctors.doctors') }}</h4><span
                class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('Dashboard/doctors.add_doctor') }}</span>
        </div>
    </div>

</div>
<!-- breadcrumb -->
@endsection
@section('content')
@include('Dashboard.messages_alert')
<!-- row -->

<!-- row -->
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('doctors.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="pd-30 pd-sm-40 bg-gray-200">

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-1">
                                <label for="name">
                                    {{ trans('Dashboard/doctors.doctor_name') }}</label>
                            </div>
                            <div class="col-md-11 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="name"
                                    placeholder="{{ __('Dashboard/doctors.doctor_name') }}" type="text">
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-1">
                                <label for="email">
                                    {{ trans('Dashboard/doctors.doctor_email') }}</label>
                            </div>
                            <div class="col-md-11 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="email"
                                    placeholder="{{ __('Dashboard/doctors.doctor_email') }}" type="email">
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-1">
                                <label for="password">
                                    {{ trans('Dashboard/doctors.password') }}
                                </label>
                            </div>
                            <div class="col-md-11  mg-t-5 mg-md-t-0 position-relative">
                                <input class="form-control" placeholder="{{ __('Dashboard/doctors.password') }}"
                                    name="password" type="password" id="password">
                                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"
                                    style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"></span>
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-1">
                                <label for="phone">
                                    {{ trans('Dashboard/doctors.phone') }}
                                </label>
                            </div>
                            <div class="col-md-11 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="phone"
                                    placeholder="{{ __('Dashboard/doctors.phone') }}" type="tel">
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-1">
                                <label for="section_id">
                                    {{ trans('Dashboard/doctors.doctor_section') }}
                                </label>
                            </div>

                            <div class="col-md-11 mg-t-5 mg-md-t-0">
                                <select name="section_id" class="form-control SlectBox">
                                    <option value="" selected disabled>
                                        -- {{ trans('Dashboard/doctors.doctor_section') }} --</option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-1">
                                <label for="appointments">
                                    {{ trans('Dashboard/doctors.appointments') }}
                                </label>
                            </div>

                            <div class="col-md-11 mg-t-5 mg-md-t-0">
                                <select multiple="multiple" class="testselect2" name="appointments[]">
                                    <option selected value="" selected disabled>-- حدد المواعيد --</option>
                                    <option value="السبت">السبت</option>
                                    <option value="الأحد">الأحد</option>
                                    <option value="الأثنين">الأثنين</option>
                                    <option value="الثلاثاء">الثلاثاء</option>
                                    <option value="الأربعاء">الأربعاء</option>
                                    <option value="الخميس">الخميس</option>
                                    <option value="الجمعة">الجمعة</option>
                                </select>

                            </div>

                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-1">
                                <label for="price">
                                    {{ trans('Dashboard/doctors.price') }}
                                </label>
                            </div>

                            <div class="col-md-11 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="price" value="0.00" type="text">
                            </div>

                        </div>



                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-1">
                                <label for="photo">
                                    {{ trans('Dashboard/doctors.doctor_photo') }}
                                </label>
                            </div>
                            <div class="col-md-11 mg-t-5 mg-md-t-0">
                                <input type="file" accept="image/*" name="photo" onchange="loadFile(event)">
                                <img style="border-radius:50%" width="150px" height="150px" id="output" />
                            </div>
                        </div>



                        <button type="submit" class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5">
                            {{ trans('Dashboard/doctors.submit') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /row -->
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>

<!--Internal  Form-elements js-->
<script src="{{ URL::asset('Dashboard/js/select2.js') }}"></script>
<script src="{{ URL::asset('Dashboard/js/advanced-form-elements.js') }}"></script>

<!--Internal Sumoselect js-->
<script src="{{ URL::asset('Dashboard/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
<!--Internal  Notify js -->
<script src="{{ URL::asset('dashboard/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('/plugins/notify/js/notifit-custom.js') }}"></script>


{{--  show password function --}}
<script>
    document.querySelector('.toggle-password').addEventListener('click', function(e) {
        const passwordField = document.querySelector('#password');
        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });
</script>
@endsection
