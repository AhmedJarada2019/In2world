@extends('dashboard.parent')
@section('content')
<div class="content d-flex flex-column flex-column-fluid container" id="kt_content">
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">الملف التعريفي</span>
            </h3>
            <div class="card-body">
               <livewire:add-c-v>
            </div>
        </div>

    </div>
  </div>
@endsection
