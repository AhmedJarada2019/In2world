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
                    <th class="min-w-150px">العنوان   </th>
                    <th class="min-w-140px">القصة</th>
                    <th class="min-w-140px">  الوصف  </th>
                    <th class="min-w-140px">  الصورة  </th>
                    <th class="min-w-140px">  الفيديو  </th>
                    <th></th>
                </tr>
            </thead>
            <!--end::Table head-->
            <!--begin::Table body-->
            <tbody>

                @forelse( $Features as $item )
                    <tr>

                        <td>
                            <div class="d-flex align-items-center">
                                <div class="d-flex justify-content-start flex-column">
                                    <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{$item->title}}</a>
                                </div>
                            </div>
                        </td>
                      <td>
                        <div class="d-flex align-items-center">
                            <div class="d-flex justify-content-start flex-column">
                                <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{$item->story}}</a>
                            </div>
                        </div>
                      </td>
                       <td>
                        <div class="d-flex align-items-center">
                            <div class="d-flex justify-content-start flex-column">
                                <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{$item->description}}</a>
                            </div>
                        </div>
                       </td>

                        <td>
                             <img src="storage/{{$item->image}}" alt="" height="125px">
                        </td>

                        <td>
                            <div class="d-flex align-items-center">
                                <div class="d-flex justify-content-start flex-column">
                                    <video width="250" height="125" controls>
                                        <source src="{{env('APP_URL').'/storage/'.$item->video}}" type="video/mp4">
                                      </video>
                                </div>
                            </div>
                           </td>

                        <td>
                            <div class="d-flex justify-content-end flex-shrink-0">
                                <button wire:click="showForm({{$item->id}})" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"  data-bs-toggle="modal" data-bs-target="#edit{{$item->id}}">
                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </button>
                                {{--edit modal --}}
                                <!-- Modal -->
                                    @if ($show == $item->id)
                                    <div  class="modal fade show" id="edit{{$item->id}}" tabindex="-1" aria-labelledby="edit{{$item->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="edit{{$item->id}}Label">تعديل خدمة</h1>
                                            <button type="button" class="btn-close" wire:click="$toggle('show')"></button>
                                        </div>
                                            <div class="modal-body">
                                                <!--begin::Form-->
                                                <form wire:submit.prevent="updateFeature({{$item->id}})" enctype="multipart/form-data">
                                                    <div>
                                                        @if (session()->has('message'))
                                                            <div class="alert alert-success">
                                                                {{ session('message') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    @method('put')
                                                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                            <span class="required">قصتنا</span>
                                                        </label>
                                                        <input type="text" class="form-control form-control-solid @error('title') is-invalid @enderror" placeholder=""  wire:model.defer="title" >
                                                            <div class="fv-plugins-message-container invalid-feedback">
                                                                @error('title')
                                                                 <p class="text-danger"> {{ $message }} </p>
                                                               @enderror
                                                             </div>
                                                    </div>
                                                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                            <span class="required">قصتنا</span>
                                                        </label>
                                                        <input type="text" class="form-control form-control-solid @error('story') is-invalid @enderror" placeholder=""  wire:model.defer="story" >
                                                            <div class="fv-plugins-message-container invalid-feedback">
                                                                @error('story')
                                                                 <p class="text-danger"> {{ $message }} </p>
                                                               @enderror
                                                             </div>
                                                    </div>

                                                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                            <span class="required">الوصف العام </span>
                                                        </label>
                                                        <textarea class="form-control form-control-solid @error('description') is-invalid @enderror" placeholder=""  wire:model.defer="description"></textarea>
                                                            <div class="fv-plugins-message-container invalid-feedback">
                                                                @error('description')
                                                                 <p class="text-danger"> {{ $message }} </p>
                                                               @enderror
                                                             </div>
                                                    </div>
                                                    <div class="uppy" id="kt_uppy_5">
                                                        <div class="uppy-wrapper">
                                                            <div class="uppy-Root uppy-FileInput-container">
                                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                                    <span class="required"> الصورة العامة</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                            <div class="image-input image-input-outline image-input-empty" data-kt-image-input="true" >
                                                                <div class="image-input-wrapper w-125px h-125px" style="background-image: none;"></div>
                                                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="" data-bs-original-title="Change avatar">
                                                                    <i class="bi bi-pencil-fill fs-7"></i>
                                                                    <input type="file" wire:model.defer="image" accept=".png, .jpg, .jpeg">
                                                                </label>

                                                            </div>
                                                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                                            <div class="fv-plugins-message-container invalid-feedback">
                                                                @error('image')
                                                                <p class="text-danger"> {{ $message }} </p>
                                                               @enderror
                                                            </div>
                                                    </div>
                                                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                            <span class="required">الفيديو العام </span>
                                                        </label>
                                                    <button type="button" class="btn btn-primary" >
                                                        <input wire:model.defer="video" type="file" name="" id="">

                                                        <!--begin::Svg Icon | path: icons/duotune/files/fil018.svg-->
                                                        <span class="svg-icon svg-icon-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="black"></path>
                                                                <path d="M10.4 3.60001L12 6H21C21.6 6 22 6.4 22 7V19C22 19.6 21.6 20 21 20H3C2.4 20 2 19.6 2 19V4C2 3.4 2.4 3 3 3H9.20001C9.70001 3 10.2 3.20001 10.4 3.60001ZM16 11.6L12.7 8.29999C12.3 7.89999 11.7 7.89999 11.3 8.29999L8 11.6H11V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V11.6H16Z" fill="black"></path>
                                                                <path opacity="0.3" d="M11 11.6V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V11.6H11Z" fill="black"></path>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->رفع فيديو</button>
                                                    </div>

                                                        <div class="modal-footer">
                                                             <button type="submit" class="btn btn-primary">
                                                                <div wire:loading>
                                                                    <div class="spinner-border text-dark" role="status">
                                                                        <span class="sr-only">Loading...</span>
                                                                      </div>
                                                                </div>
                                                               حفظ التعديلات  </button>
                                                        </div>
                                                </form>
                                         </div>
                                       </div>
                                     </div>
                                    </div>
                                    @endif
                                <form wire:submit.prevent="deleteFeature({{$item->id}})">
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

