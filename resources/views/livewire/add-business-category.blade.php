<form wire:submit.prevent="addCategory" enctype="multipart/form-data">
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
           <span class="required">اسم القسم </span>
       </label>
       <input type="text" class="form-control form-control-solid @error('name') is-invalid @enderror" placeholder=""  wire:model.defer="name" >
       <div class="fv-plugins-message-container invalid-feedback">
           @error('name')
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
               إضافة قسم</button>
        </div>
</form>
