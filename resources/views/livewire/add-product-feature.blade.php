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
            <span class="required">عنوان الميزة </span>
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
            <span class="required">وصف الميزة </span>
        </label>
        <input type="text" class="form-control form-control-solid @error('description') is-invalid @enderror" placeholder=""  wire:model.defer="description" >
            <div class="fv-plugins-message-container invalid-feedback">
                @error('description')
                 <p class="text-danger"> {{ $message }} </p>
               @enderror
             </div>
    </div>
    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">تحديد المنتج</span>
        </label>
        <select class="form-control form-control-solid @error('product_id') is-invalid @enderror" wire:model.defer="product_id">
            @foreach ($products as $item)
             <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
         <div class="fv-plugins-message-container invalid-feedback">
                @error('product_id')
                 <p class="text-danger"> {{ $message }} </p>
               @enderror
             </div>
    </div>
    <div class="uppy" id="kt_uppy_5" wire:ignore>
        <div class="uppy-wrapper">
            <div class="uppy-Root uppy-FileInput-container">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">أيقونة الميزة </span>
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
