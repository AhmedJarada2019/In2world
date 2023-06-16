<form wire:submit.prevent="addCV" enctype="multipart/form-data">
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
            <span class="required">الملف التعريفي</span>
        </label>
    <button type="button" class="btn btn-primary">
        <input wire:model.defer="file" type="file" name="" id="">

        <!--begin::Svg Icon | path: icons/duotune/files/fil018.svg-->
        <span class="svg-icon svg-icon-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="black"></path>
                <path d="M10.4 3.60001L12 6H21C21.6 6 22 6.4 22 7V19C22 19.6 21.6 20 21 20H3C2.4 20 2 19.6 2 19V4C2 3.4 2.4 3 3 3H9.20001C9.70001 3 10.2 3.20001 10.4 3.60001ZM16 11.6L12.7 8.29999C12.3 7.89999 11.7 7.89999 11.3 8.29999L8 11.6H11V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V11.6H16Z" fill="black"></path>
                <path opacity="0.3" d="M11 11.6V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V11.6H11Z" fill="black"></path>
            </svg>
        </span>
        <!--end::Svg Icon-->رفع الملف التعريفي</button>
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
