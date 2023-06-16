<form wire:submit.prevent="addFeature" enctype="multipart/form-data">
    <div>
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
    </div>
    @method('post')

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
    <div class="uppy" id="kt_uppy_5" wire:ignore>
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
               إضافة </button>
        </div>
</form>
