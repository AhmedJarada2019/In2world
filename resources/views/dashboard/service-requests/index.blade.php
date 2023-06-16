@extends('dashboard.parent')
@section('content')

    <!--begin::Content-->
      <div class="content d-flex flex-column flex-column-fluid container" id="kt_content">
        <div class="card mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">طلبات الخدمات</span>
                </h3>

            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <livewire:service-request/>
            {{$requests->links()}}
            <!--begin::Body-->
        </div>
      </div>
    <!--end::Content-->
@endsection
