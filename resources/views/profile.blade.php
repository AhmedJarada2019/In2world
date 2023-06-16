@extends('dashboard.parent')
@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                        <!--begin::Card header-->
                        <div class="card-header cursor-pointer">
                            <!--begin::Card title-->
                            <div class="card-title m-0">
                                <h3 class="fw-bolder m-0">تفاصيل الحساب </h3>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--begin::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body p-9">
                            <!--begin::Row-->
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 mb-3 mb-lg-0 fw-bold text-muted">الإسم</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span class="fw-bolder fs-6 text-gray-800">{{Auth::user()->name}}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                            <!--begin::Input group-->
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 mb-3 mb-lg-0 fw-bold text-muted">البريد الالكتروني</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <span class="fw-bold text-gray-800 fs-6">{{Auth::user()->email}}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                                <!--begin::Label-->
                               <form action="{{route('main.store')}}" method="POST">
                                <div class="row mb-7">
                                @csrf
                                <label class="col-lg-4 mb-3 mb-lg-0 fw-bold text-muted">  كلمة المرور الجديدة</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" class="form-control w-100" name="password">
                                </div>
                            </div>
                                <button type="submit" class="btn btn-success">تغيير</button>
                                <input type="hidden" name="id" value="{{Auth::user()->id}}">
                               </form>
                                <!--end::Col-->
                            <!--end::Input group-->
                        </div>
                        <!--end::Card body-->
                    </div>
                </div>
            </div>
        </div>
      </div>
    <!--end::Content-->
@endsection
