<div class="card-body py-3">
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    <script>
        setTimeout(() => {
             $('.alert').slideUp(1000);
        }, 3000);
    </script>
@endif
    <!--begin::Table container-->
    <div class="table-responsive">
        <!--begin::Table-->
        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
            <!--begin::Table head-->
            <thead>
                <tr class="fw-bolder text-muted">
                    <th class="min-w-150px">الايميل </th>
                    <th class="min-w-140px">عنوان IP</th>
                    <th></th>
                </tr>
            </thead>
            <!--end::Table head-->
            <!--begin::Table body-->
            <tbody>

                @forelse( $newsLetter as $item )
                    <tr>

                        <td>
                            <div class="d-flex align-items-center">
                                <div class="d-flex justify-content-start flex-column">
                                    <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{$item->email}}</a>
                                </div>
                            </div>
                        </td>
                      <td>
                        <div class="d-flex align-items-center">
                            <div class="d-flex justify-content-start flex-column">
                                <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{$item->ip_address}}</a>
                            </div>
                        </div>
                      </td>

                        <td>
                            <div class="d-flex justify-content-end flex-shrink-0">
                                <form wire:submit.prevent="deleteNewsLetter({{$item->id}})">
                                <button type="submit" onclick="return confirm('هل أنت متأكدمن عملية الحذف')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
                                            <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
                                            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                        <td colspan="4">
                            <p class="text-dark fw-bolder text-hover-primary d-block fs-6">No Data</p>
                        </td>
                    @endforelse
            </tbody>
            <!--end::Table body-->
        </table>

         <!--end::Table-->
    </div>
    <!--end::Table container-->
</div>

