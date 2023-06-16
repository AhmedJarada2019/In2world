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

                    <th class="min-w-150px">عنوان المقالة </th>
                     <th class="min-w-150px">تاريخ المقالة </th>
                    <th class="min-w-140px">القسم </th>
                    <th class="min-w-120px">الرابط المختصر</th>
                    <th class="min-w-140px">الوصف المختصر</th>
                    <th class="min-w-100px">المقال كاملا</th>
                    <th class="min-w-100px">وصف العنوان</th>
                    <th class="min-w-100px"> الوصف الداخلي</th>
                    <th class="min-w-100px"> الكلمات المفتاحية</th>
                    <th class="min-w-100px">الوسوم</th>
                    <th class="min-w-100px">النص البديل</th>
                    <th class="min-w-100px">الصورة الرئيسية</th>
                </tr>
            </thead>
            <!--end::Table head-->
            <!--begin::Table body-->
            <tbody>
                @forelse( $articles as $article )

                    <tr>

                        <td>
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-45px me-5">
                                    <img src="{{$article->small_image}}" alt="">
                                </div>
                                <div class="d-flex justify-content-start flex-column">
                                    <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{$article->article_title}}</a>

                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-dark fw-bolder text-hover-primary d-block fs-6">{{$article->date}}</p>
                        </td>
                        <td>
                            <p class="text-dark fw-bolder text-hover-primary d-block fs-6">

                            @foreach ($article->ArticleCategory as $category)
                                {{$category->name}}
                            @endforeach
                            </p>
                        </td>
                        <td>
                            <p class="text-dark fw-bolder text-hover-primary d-block fs-6">{{$article->slug}}</p>
                        </td>
                        <td>
                            <p class="text-dark fw-bolder text-hover-primary d-block fs-6">{{$article->short_description}}</p>
                        </td>
                        <td>
                            <p  class="text-dark fw-bolder text-hover-primary d-block fs-6">{{Str::of(strip_tags($article->full_description))->limit(20);}}</p>
                        </td>
                        <td>
                            <p  class="text-dark fw-bolder text-hover-primary d-block fs-6">{{$article->meta_title}}</p>
                        </td>
                        <td>
                            <p  class="text-dark fw-bolder text-hover-primary d-block fs-6">{{$article->meta_description}}</p>
                        </td>
                        <td>
                            <p  class="text-dark fw-bolder text-hover-primary d-block fs-6">{{$article->key_words}}</p>
                        </td>
                        <td>
                            <p  class="text-dark fw-bolder text-hover-primary d-block fs-6">
                                @foreach ($article->ArticleTags as $item)
                                    {{$item->name}}
                                 @endforeach
                            </p>
                        </td>
                        <td>
                            <p  class="text-dark fw-bolder text-hover-primary d-block fs-6">{{$article->alt_text_image}}</p>
                        </td>
                        <td>
                            <img src="{{asset('storage/'.$article->main_image)}}" alt="" height="200px" width="350px">
                        </td>
                          <td>
                            <div class="d-flex justify-content-end flex-shrink-0">
                                <button wire:click="showForm({{$article->id}})" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"  data-bs-toggle="modal" data-bs-target="#edit{{$article->id}}">
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
                                    @if ($show == $article->id)
                                    <div  class="modal fade show" id="edit{{$article->id}}" tabindex="-1" aria-labelledby="edit{{$article->id}}Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="edit{{$article->id}}Label">تعديل المقال</h1>
                                                        <button type="button" class="btn-close" wire:click="$toggle('show')"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!--begin::Form-->
                                                                <form wire:submit.prevent="updateArticle({{$article->id}})" enctype="multipart/form-data" >
                                                                    @csrf
                                                                    @method('PUT')
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

                                                                      <select class="form-control form-control-solid form-select-multiple @error('tags_') is-invalid @enderror" placeholder=""  wire:model.defer="tags_" multiple>
                                                                           @foreach ($Tags as $tag)
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
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    @endif
                                <form wire:submit.prevent="deleteArticle({{$article->id}})">
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

