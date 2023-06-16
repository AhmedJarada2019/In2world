<form wire:submit.prevent="addProduct" enctype="multipart/form-data">
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
            <span class="required">اسم المنتج</span>
        </label>
        <input type="text" class="form-control form-control-solid @error('name') is-invalid @enderror" placeholder=""  wire:model.defer="name" >
            <div class="fv-plugins-message-container invalid-feedback">
                @error('name')
                 <p class="text-danger"> {{ $message }} </p>
               @enderror
             </div>
    </div>

    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">العنوان الرئيسي</span>
        </label>
        <input type="text" class="form-control form-control-solid @error('main_title') is-invalid @enderror" placeholder=""  wire:model.defer="main_title" >
            <div class="fv-plugins-message-container invalid-feedback">
                @error('main_title')
                 <p class="text-danger"> {{ $message }} </p>
               @enderror
             </div>
    </div>

    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">الوصف الرئيسي</span>
        </label>
        <input type="text" class="form-control form-control-solid @error('main_description') is-invalid @enderror" placeholder=""  wire:model.defer="main_description" >
            <div class="fv-plugins-message-container invalid-feedback">
                @error('main_description')
                 <p class="text-danger"> {{ $message }} </p>
               @enderror
             </div>
    </div>
    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">رابط المنتج</span>
        </label>
        <input type="text" class="form-control form-control-solid @error('product_url') is-invalid @enderror" placeholder=""  wire:model.defer="product_url" >
            <div class="fv-plugins-message-container invalid-feedback">
                @error('product_url')
                 <p class="text-danger"> {{ $message }} </p>
               @enderror
             </div>
    </div>
    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">رابط الفيديو</span>
        </label>
        <input type="text" class="form-control form-control-solid @error('video_url') is-invalid @enderror" placeholder=""  wire:model.defer="video_url" >
            <div class="fv-plugins-message-container invalid-feedback">
                @error('video_url')
                 <p class="text-danger"> {{ $message }} </p>
               @enderror
             </div>
    </div>

    <div class="uppy" id="kt_uppy_5" wire:ignore>
        <div class="uppy-wrapper">
            <div class="uppy-Root uppy-FileInput-container">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">الصورة الرئيسية</span>
                </label>
            </div>
        </div>
            <div class="image-input image-input-outline image-input-empty" data-kt-image-input="true" >
                <div class="image-input-wrapper w-125px h-125px" style="background-image: none;"></div>
                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="" data-bs-original-title="Change avatar">
                    <i class="bi bi-pencil-fill fs-7"></i>
                    <input type="file" wire:model.defer="main_image" accept=".png, .jpg, .jpeg">
                </label>

            </div>
            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
            <div class="fv-plugins-message-container invalid-feedback">
                @error('main_image')
                <p class="text-danger"> {{ $message }} </p>
               @enderror
            </div>
    </div>
    <div class="uppy" id="kt_uppy_5" wire:ignore>
        <div class="uppy-wrapper">
            <div class="uppy-Root uppy-FileInput-container">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">الصورة المصغرة</span>
                </label>
            </div>
        </div>
            <div class="image-input image-input-outline image-input-empty" data-kt-image-input="true" >
                <div class="image-input-wrapper w-125px h-125px" style="background-image: none;"></div>
                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="" data-bs-original-title="Change avatar">
                    <i class="bi bi-pencil-fill fs-7"></i>
                    <input type="file" wire:model.defer="small_image" accept=".png, .jpg, .jpeg">
                </label>

            </div>
            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
            <div class="fv-plugins-message-container invalid-feedback">
                @error('small_image')
                <p class="text-danger"> {{ $message }} </p>
               @enderror
            </div>
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
