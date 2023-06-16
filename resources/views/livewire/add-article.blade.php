<form wire:submit.prevent="addArticle" enctype="multipart/form-data">
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
       <div class="row">
        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
               <span class="required">عنوان المقالة</span>
           </label>
           <input type="text" class="form-control form-control-solid @error('article_title') is-invalid @enderror" placeholder=""  wire:model.defer="article_title" >
           <div class="fv-plugins-message-container invalid-feedback">
               @error('article_title')
               <p class="text-danger"> {{ $message }} </p>
              @enderror
           </div>
       </div>
       <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
           <label class="d-flex align-items-center fs-6 fw-bold mb-2">
              <span class="required">تاريخ المقالة</span>
          </label>
          <input type="date" class="form-control form-control-solid @error('date') is-invalid @enderror" placeholder=""  wire:model.defer="date" >
          <div class="fv-plugins-message-container invalid-feedback">
              @error('date')
              <p class="text-danger"> {{ $message }} </p>
             @enderror
          </div>
      </div>
       <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
           <label class="d-flex align-items-center fs-6 fw-bold mb-2">
              <span class="required">القسم</span>
          </label>
          <select class="form-control form-control-solid form-select-multiple @error('category') is-invalid @enderror" placeholder=""  wire:model.defer="category" multiple>
               @foreach ($categories as $category )
                   <option value="{{$category->id}}">{{$category->name}}</option>
               @endforeach
           </select>
          <div class="fv-plugins-message-container invalid-feedback">
              @error('category')
              <p class="text-danger"> {{ $message }} </p>
             @enderror
          </div>
      </div>

      <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
           <label class="d-flex align-items-center fs-6 fw-bold mb-2">
           <span class="required">الوسوم</span>
       </label>

      <select class="form-control form-control-solid form-select-multiple @error('tags') is-invalid @enderror" placeholder=""  wire:model.defer="tags" multiple>
           @foreach ($tags_ as $tag)
               <option value="{{$tag->id}}">{{$tag->name}}</option>
           @endforeach
       </select>
      <div class="fv-plugins-message-container invalid-feedback">
          @error('tags')
          <p class="text-danger"> {{ $message }} </p>
         @enderror
      </div>
  </div>

   <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
       <label class="d-flex align-items-center fs-6 fw-bold mb-2">
           <span class="required">الوصف المختصر </span>
       </label>
       <input type="text" class="form-control form-control-solid @error('short_description') is-invalid @enderror" placeholder="" wire:model.defer="short_description" >
       <div class="fv-plugins-message-container invalid-feedback">
           @error('short_description')
           <p class="text-danger"> {{ $message }} </p>
          @enderror
       </div>
   </div>
   <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
       <label class="d-flex align-items-center fs-6 fw-bold mb-2">
           <span class="required">وصف العنوان </span>
       </label>
       <input type="text" class="form-control form-control-solid @error('meta_title') is-invalid @enderror" placeholder="" wire:model.defer="meta_title" >
       <div class="fv-plugins-message-container invalid-feedback">
           @error('meta_title')
           <p class="text-danger"> {{ $message }} </p>
          @enderror
       </div>
   </div>
   <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
       <label class="d-flex align-items-center fs-6 fw-bold mb-2">
           <span class="required">الوصف الداخلي </span>
       </label>
       <input type="text" class="form-control form-control-solid @error('meta_description') is-invalid @enderror" placeholder="" wire:model.defer="meta_description" >
       <div class="fv-plugins-message-container invalid-feedback">
           @error('meta_description')
           <p class="text-danger"> {{ $message }} </p>
          @enderror
       </div>
   </div>
   <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
       <label class="d-flex align-items-center fs-6 fw-bold mb-2">
           <span class="required">الكلمات المفتاحية</span>
       </label>
       <input type="text" class="form-control form-control-solid @error('key_words') is-invalid @enderror" placeholder="" wire:model.defer="key_words" >
       <div class="fv-plugins-message-container invalid-feedback">
           @error('key_words')
           <p class="text-danger"> {{ $message }} </p>
          @enderror
       </div>
   </div>
   <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
       <label class="d-flex align-items-center fs-6 fw-bold mb-2">
           <span class="required">الرابط المختصر</span>
       </label>
       <input type="text" class="form-control form-control-solid @error('slug') is-invalid @enderror" placeholder="" wire:model.defer="slug" >
       <div class="fv-plugins-message-container invalid-feedback">
           @error('slug')
           <p class="text-danger"> {{ $message }} </p>
          @enderror
       </div>
   </div>

   <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
       <label class="d-flex align-items-center fs-6 fw-bold mb-2">
           <span class="required">النص البديل </span>
       </label>
       <input type="text" class="form-control form-control-solid @error('alt_text_image') is-invalid @enderror" placeholder="" wire:model.defer="alt_text_image" >
       <div class="fv-plugins-message-container invalid-feedback">
           @error('alt_text_image')
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
            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="" data-bs-original-title="Change main image">
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

    <div class="row">
         <div class="col-md-12">
            <div class="form-group" wire:ignore>
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">المقال كاملا </span>
                </label>
                <textarea value="" wire:model.defer="full_description"
                         name="full_description" id="full_description" data-description="@this"
                         class="form-control editor @error('full_description') is-invalid @enderror"
                         type="text"></textarea>
               @error('full_description')
               <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
               @enderror
               <script>
                    class MyUploadAdapter {
                        constructor( loader ) {
                            this.loader = loader;
                        }
                                upload() {
                                    return this.loader.file
                                        .then( file => new Promise( ( resolve, reject ) => {
                                            this._initRequest();
                                            this._initListeners( resolve, reject, file );
                                            this._sendRequest( file );
                                        } ) );
                                }
                                abort() {
                                    if ( this.xhr ) {
                                        this.xhr.abort();
                                    }
                                }
                                _initRequest() {
                                    const xhr = this.xhr = new XMLHttpRequest();
                                    xhr.open( 'POST', "{{ route('upload') }}", true );
                                    xhr.setRequestHeader( 'x-csrf-token', '{{ csrf_token() }}' );
                                    xhr.responseType = 'json';
                                }
                                _initListeners( resolve, reject, file ) {
                                    const xhr = this.xhr;
                                    const loader = this.loader;
                                    const genericErrorText = `Couldn't upload file: ${ file.name }.`;

                                    xhr.addEventListener( 'error', () => reject( genericErrorText ) );
                                    xhr.addEventListener( 'abort', () => reject() );
                                    xhr.addEventListener( 'load', () => {
                                        const response = xhr.response;
                                        if ( !response || response.error ) {
                                            return reject( response && response.error ? response.error.message : genericErrorText );
                                        }
                                        resolve( {
                                            default: response.url
                                        } );
                                    } );
                                    if ( xhr.upload ) {
                                        xhr.upload.addEventListener( 'progress', evt => {
                                            if ( evt.lengthComputable ) {
                                                loader.uploadTotal = evt.total;
                                                loader.uploaded = evt.loaded;
                                            }
                                        } );
                                    }
                                }
                                _sendRequest( file ) {
                                    const data = new FormData();
                                    data.append( 'upload', file );
                                    this.xhr.send( data );
                                }
                            }
                            function MyCustomUploadAdapterPlugin( editor ) {
                                editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
                                    return new MyUploadAdapter( loader );
                                };
                            }
                            ClassicEditor
                                .create(document.querySelector('#full_description'), {
                                    extraPlugins: [ MyCustomUploadAdapterPlugin ],
                                })
                                .then(editor => {
                                    editor.model.document.on('change:data', () => {
                                    @this.set('full_description', editor.getData(),true);
                                    });
                                    options = {
                                        clearForm: true
                                    };
                                })
                                .catch(error => {
                                    console.error(error);
                                });
                 </script>
            </div>
         </div>
    </div>
        <div class="modal-footer mt-2">
            <div>
                <div wire:loading>
                    <i class="fas fa-sync fa-spin"></i>
                    جاري التحميل ...
                </div>
            </div>
            <div>
                <button wire:loading.attr="disabled" class="btn btn-primary" type="submit">إضافة</button>
            </div>
        </div>
    </div>
</form>
